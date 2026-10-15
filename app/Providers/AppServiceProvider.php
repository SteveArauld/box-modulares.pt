<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Purely visual nav groupings: a parent label with no catalog record of
     * its own, whose children are real (visible) categories. Used to nest
     * "Contenedore modificado" / "Contenedore sanitario" under "Conteneurs"
     * without introducing a parent/child column on the categories table.
     *
     * @var array<string, list<string>>
     */
    private const NAV_GROUPS = [
        'Conteneurs' => ['Contenedore modificado', 'Contenedore sanitario'],
    ];

    private const LOCALE_LABELS = [
        'es' => 'ES',
        'it' => 'IT',
        'de' => 'DE',
        'pt' => 'PT',
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['partials.header', 'partials.footer'], function ($view): void {
            $categories = Category::query()->where('is_visible', true)->withCount('products')->orderBy('name->es')->get();

            $currentCategory = request()->route('slug') && request()->routeIs('category')
                ? $categories->first(fn (Category $category) => $category->translatedValue('slug') === request()->route('slug'))
                : null;
            $currentCategoryName = $currentCategory?->translatedValue('name');

            $navTree = $this->buildNavTree($categories, $currentCategoryName);

            $view->with('navCategories', $categories);
            $view->with('navTree', $navTree);
            $view->with('currentCategoryName', $currentCategoryName);
            $view->with('availableLocales', self::LOCALE_LABELS);
            $view->with('currentLocale', app()->getLocale());
        });
    }

    /**
     * Build the nav entries shown in the header/footer menus: visible
     * categories, with any configured in NAV_GROUPS nested under their
     * shared parent label instead of listed at the top level.
     *
     * @param  Collection<int, Category>  $categories
     * @return Collection<int, array{label: string, href: string, active: bool, children: Collection<int, array{label: string, href: string, active: bool}>}>
     */
    private function buildNavTree(Collection $categories, ?string $currentCategoryName): Collection
    {
        $groupedNames = collect(self::NAV_GROUPS)->flatten();

        $entries = collect();

        foreach (self::NAV_GROUPS as $groupLabel => $memberNames) {
            $members = $categories->filter(
                fn (Category $category) => in_array($category->translatedValue('name'), $memberNames, true)
            )->values();

            if ($members->isEmpty()) {
                continue;
            }

            $children = $members->map(fn (Category $category) => [
                'label' => $category->translatedValue('name'),
                'href' => route('category', $category->translatedValue('slug')),
                'active' => $category->translatedValue('name') === $currentCategoryName,
            ]);

            $entries->push([
                'label' => $groupLabel,
                'href' => $children->first()['href'],
                'active' => $children->contains('active', true),
                'children' => $children,
            ]);
        }

        foreach ($categories as $category) {
            $name = $category->translatedValue('name');

            if ($groupedNames->contains($name)) {
                continue;
            }

            $entries->push([
                'label' => $name,
                'href' => route('category', $category->translatedValue('slug')),
                'active' => $name === $currentCategoryName,
                'children' => collect(),
            ]);
        }

        return $entries;
    }
}
