<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ShopController extends Controller
{
    /**
     * Catégories à afficher sur la page d'accueil.
     *
     * On utilise les SLUGS ESPAGNOLS comme clés stables pour lier
     * une catégorie à son icône, indépendamment de la langue active.
     * (Peu importe la langue courante, on fait le lookup sur slug->es.)
     *
     * Une valeur `null` signifie qu'il n'existe pas d'icône statique pour
     * cette catégorie : on retombe alors sur l'image du premier produit.
     */
     private const HOME_CATEGORY_ICONS = [
        // 1. Conteneurs préfabriqués (comme les maisons)
        'casas-moviles'                        => null,
        'casas-modulares'                      => null,
        'casas-moviles-prefabricadas'          => null,
        
        // 2. Conteneurs de bureau / modulaires
        'casetas-de-obra-y-modulos-sanitarios' => null,
        'bar-contenedor'                       => null,

        // 3. Conteneurs piscine
        'piscina-contenedor'                   => null,

        // 4. Conteneurs maritimes et plates-formes
        'contenedores-maritimos'               => null,
        'plataformas-elevadoras'               => null,
        'contenedores-de-envio'                => null,
        'contenedores-maritimos-de-20-pies'    => null,
        'contenedores-maritimos-de-40-pies'    => null,
    ];

    /**
     * Renvoie le nom de la colonne JSON à utiliser pour un champ translatable,
     * en fonction de la locale active, avec fallback sur 'es' si la valeur
     * est vide dans la langue courante.
     *
     * Utilisation : ->where($this->localizedColumn('slug'), $value)
     *               ->orderBy($this->localizedColumn('name'))
     */
  private function localizedColumn(string $field, ?string $fallback = 'es'): string
{
    $locale = app()->getLocale();
    $driver = \DB::connection()->getDriverName();

    // Selon le driver, on utilise une syntaxe différente pour extraire le JSON
    $extract = function (string $column, string $lang) use ($driver): string {
        return match ($driver) {
            'sqlite'  => "json_extract({$column}, '$.{$lang}')",
            'pgsql'   => "{$column}->>'{$lang}'",
            'mysql', 'mariadb' => "JSON_UNQUOTE(JSON_EXTRACT({$column}, '$.{$lang}'))",
            default   => "JSON_UNQUOTE(JSON_EXTRACT({$column}, '$.{$lang}'))",
        };
    };

    if ($locale === $fallback || $fallback === null) {
        return $extract($field, $locale);
    }

    return "COALESCE("
        . $extract($field, $locale) . ", "
        . $extract($field, $fallback)
        . ")";
}

    public function home(Request $request): View
    {
        // On récupère TOUTES les catégories visibles, indexées par leur slug ESPAGNOL
        // (clé stable, indépendante de la langue courante).
        $categoriesBySlug = Category::query()
            ->where('is_visible', true)
            ->get()
            ->keyBy(fn (Category $category) => $category->translatedValue('slug', 'es'));

        // On construit la collection DANS L'ORDRE EXACT de HOME_CATEGORY_ICONS
        // pour éviter tout décalage entre l'image et le nom de la catégorie.
        $heroCategories = collect();

        foreach (self::HOME_CATEGORY_ICONS as $slug => $iconPath) {
            if (! $categoriesBySlug->has($slug)) {
                continue;
            }

            $category = $categoriesBySlug->get($slug);

            if ($iconPath === null) {
                $firstProductImage = $category->products()->orderBy('id')->first()?->coverImage;
                $iconPath = $firstProductImage ? ltrim($firstProductImage, '/') : null;
            }

            if ($iconPath === null) {
                continue;
            }

            $heroCategories->push([
                'category' => $category,
                'icon' => $iconPath,
            ]);
        }

        $featuredProducts = Product::query()
            ->with('category')
            ->whereHas('category', fn ($query) => $query->where('is_visible', true))
            ->orderByRaw('featured_position IS NULL')
            ->orderBy('featured_position')
            ->orderBy('id')
            ->paginate(24, ['*'], 'product-page')
            ->withQueryString();

        return view('pages.home', compact('heroCategories', 'featuredProducts'));
    }

    public function shopIndex(Request $request): View
    {
        return $this->renderCatalog($request, null);
    }

    public function shop(string $slug): View
    {
        // On cherche le produit par slug dans la langue courante,
        // avec fallback sur 'es' si la valeur est vide dans cette langue.
        $column = $this->localizedColumn('slug');

        $product = Product::query()
            ->whereRaw("{$column} = ?", [$slug])
            ->firstOrFail();

        $product->load('category');

        $relatedProducts = Product::query()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $previousProduct = Product::query()->where('id', '<', $product->id)->orderByDesc('id')->first();
        $nextProduct = Product::query()->where('id', '>', $product->id)->orderBy('id')->first();

        return view('pages.product', compact('product', 'relatedProducts', 'previousProduct', 'nextProduct'));
    }

    public function category(Request $request, string $slug): View
    {
        // Idem : lookup slug dans la langue courante, fallback sur 'es'.
        $column = $this->localizedColumn('slug');

        $category = Category::query()
            ->whereRaw("{$column} = ?", [$slug])
            ->where('is_visible', true)
            ->firstOrFail();

        return $this->renderCatalog($request, $category);
    }

    public function search(Request $request): View
    {
        $term = trim((string) $request->query('q', ''));
        $nameColumn = $this->localizedColumn('name');

        $query = Product::query()
            ->with('category')
            ->whereHas('category', fn ($query) => $query->where('is_visible', true))
            ->when($term !== '', fn ($query) => $query->whereRaw("{$nameColumn} LIKE ?", ['%'.$term.'%']))
            ->orderByRaw($nameColumn);

        $this->applyPriceFilter($query, $request);

        $products = $query->paginate(24)->withQueryString();

        $categories = Category::query()
            ->where('is_visible', true)
            ->withCount('products')
            ->orderByRaw($this->localizedColumn('name'))
            ->get();

        $priceFilters = $this->buildPriceFilters($request);

        return view('pages.shop', [
            'category' => null,
            'products' => $products,
            'categories' => $categories,
            'searchTerm' => $term,
            'priceFilters' => $priceFilters['filters'],
            'allPricesUrl' => $priceFilters['allUrl'],
            'allPricesActive' => $priceFilters['allActive'],
            'preservedFilterQuery' => $this->preservedFilterQuery($request),
            'pageTitle' => $term !== '' ? __('Resultados para «:term»', ['term' => $term]) : __('Buscar productos'),
        ]);
    }

    /**
     * Price brackets for the sidebar filter, in whole euros. A null max
     * means "no upper limit" (used for the last bracket).
     *
     * @var array<int, array{min: int, max: ?int}>
     */
    private const PRICE_BRACKETS = [
        ['min' => 0, 'max' => 3000],
        ['min' => 3000, 'max' => 6000],
        ['min' => 6000, 'max' => 9000],
        ['min' => 9000, 'max' => null],
    ];

    /**
     * The current price/sort/display filters as a query string, so that
     * switching category from the sidebar doesn't silently drop them —
     * picking a category and a price range should combine, not replace
     * each other.
     */
    private function preservedFilterQuery(Request $request): string
    {
        return http_build_query(array_filter([
            'min_price' => $request->query('min_price'),
            'max_price' => $request->query('max_price'),
            'orderby' => $request->query('orderby'),
            'per_page' => $request->query('per_page'),
        ], fn ($value) => $value !== null && $value !== ''));
    }

    /**
     * Scope a product query to the min_price/max_price query string, if present.
     */
    private function applyPriceFilter(Builder $query, Request $request): void
    {
        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');

        if (is_numeric($minPrice)) {
            $query->whereRaw("CAST(json_extract(prices, '$.price') AS INTEGER) >= ?", [((int) $minPrice) * 100]);
        }

        if (is_numeric($maxPrice)) {
            $query->whereRaw("CAST(json_extract(prices, '$.price') AS INTEGER) <= ?", [((int) $maxPrice) * 100]);
        }
    }

    /**
     * Build the sidebar price-filter links (brackets + the "Todo" reset link)
     * for the current request, preserving every other active query param.
     *
     * @return array{filters: Collection, allUrl: string, allActive: bool}
     */
    private function buildPriceFilters(Request $request): array
    {
        $filters = collect(self::PRICE_BRACKETS)->map(function (array $bracket) use ($request) {
            $label = $bracket['max'] === null
                ? '€'.number_format($bracket['min'], 2, ',', '.').' +'
                : '€'.number_format($bracket['min'], 2, ',', '.').' - €'.number_format($bracket['max'], 2, ',', '.');

            $isActive = (string) $request->query('min_price') === (string) $bracket['min']
                && (string) $request->query('max_price') === (string) ($bracket['max'] ?? '');

            return [
                'label' => $label,
                'url' => $request->fullUrlWithQuery([
                    'min_price' => $bracket['min'],
                    'max_price' => $bracket['max'],
                    'page' => null,
                ]),
                'active' => $isActive,
            ];
        });

        return [
            'filters' => $filters,
            'allUrl' => $request->fullUrlWithQuery(['min_price' => null, 'max_price' => null, 'page' => null]),
            'allActive' => ! is_numeric($request->query('min_price')) && ! is_numeric($request->query('max_price')),
        ];
    }

    private function renderCatalog(Request $request, ?Category $category): View
    {
        $query = Product::query()->with('category');
        $nameColumn = $this->localizedColumn('name');

        if ($category) {
            $query->where('category_id', $category->id);
        } else {
            $query->whereHas('category', fn ($query) => $query->where('is_visible', true));
        }

        $this->applyPriceFilter($query, $request);

        match ($request->query('orderby')) {
            'price' => $query->orderByRaw("CAST(json_extract(prices, '$.price') AS INTEGER) asc"),
            'price-desc' => $query->orderByRaw("CAST(json_extract(prices, '$.price') AS INTEGER) desc"),
            'date' => $query->latest(),
            default => $query->orderByRaw($nameColumn),
        };

        $perPage = (int) $request->query('per_page', 24);
        $perPage = in_array($perPage, [9, 12, 18, 24], true) ? $perPage : 24;

        $products = $query->paginate($perPage)->withQueryString();

        $categories = Category::query()
            ->where('is_visible', true)
            ->withCount('products')
            ->orderByRaw($this->localizedColumn('name'))
            ->get();

        $priceFilters = $this->buildPriceFilters($request);

        return view('pages.shop', [
            'category' => $category,
            'products' => $products,
            'categories' => $categories,
            'searchTerm' => null,
            'priceFilters' => $priceFilters['filters'],
            'allPricesUrl' => $priceFilters['allUrl'],
            'allPricesActive' => $priceFilters['allActive'],
            'preservedFilterQuery' => $this->preservedFilterQuery($request),
            'pageTitle' => $category?->translatedValue('name') ?? 'Tienda',
        ]);
    }

    public function myAccount(): View
    {
        if (Auth::check()) {
            $orders = Auth::user()->orders()->with('items')->get();

            return view('pages.account', compact('orders'));
        }

        return view('pages.my-account');
    }

    public function lostPassword(): View
    {
        return view('pages.lost-password');
    }

    public function sendLostPassword(Request $request): RedirectResponse
    {
        $request->validate(['user_login' => ['required', 'string']]);

        $email = $request->string('user_login')->toString();

        Password::sendResetLink(['email' => $email]);

        return back()->with('status', 'Si ese correo existe en nuestro sistema, recibirás un enlace para restablecer tu contraseña.');
    }

    public function carrito(): View
    {
        $suggestedProducts = Product::query()->with('category')->inRandomOrder()->limit(4)->get();

        return view('pages.carrito', compact('suggestedProducts'));
    }

    public function checkout(): View
    {
        return view('pages.checkout');
    }

    public function orderConfirmation(string $orderNumber): View
    {
        $order = Order::query()->where('order_number', $orderNumber)->with('items')->firstOrFail();

        return view('pages.order-confirmation', compact('order'));
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function shippingPolicy(): View
    {
        return view('pages.shipping-policy');
    }

    public function returnPolicy(): View
    {
        return view('pages.return-policy');
    }

    public function paymentPolicy(): View
    {
        return view('pages.payment-policy');
    }

    // --- Legal Information ---
    public function legalNotice(): View
    {
        return view('pages.legal-notice');
    }

    public function termsOfUse(): View
    {
        return view('pages.terms-of-use');
    }

    public function termsOfSale(): View
    {
        return view('pages.terms-of-sale');
    }

    public function privacyPolicy(): View
    {
        return view('pages.privacy-policy');
    }

    public function cookiePolicy(): View
    {
        return view('pages.cookie-policy');
    }
}