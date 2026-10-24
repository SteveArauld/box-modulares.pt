<?php

/**
 * Per-locale URL segments for every "page" route, keyed by the base route
 * name used after the locale prefix is stripped (see routes/web.php).
 * `product` and `category` only translate the fixed segment in front of
 * the `{slug}` parameter — the slug itself is translated per-locale on the
 * Eloquent model (spatie/laravel-translatable).
 *
 * Every locale listed in App\Http\Middleware\SetLocale::SUPPORTED_LOCALES
 * MUST have an entry here for every route key below, or route registration
 * in routes/web.php throws "Undefined array key" at boot time. To add a
 * locale: add it to SUPPORTED_LOCALES, then add its translated segment to
 * every array below (and to App\Providers\AppServiceProvider::LOCALE_LABELS
 * for the header language switcher).
 */

return [
    'home' => [
        'fr' => '',
        'pt' => '',
        'es' => '',
    ],
    'shop.index' => [
        'fr' => 'boutique',
        'pt' => 'loja',
        'es' => 'tienda',
    ],
    'shop.search' => [
        'fr' => 'recherche',
        'pt' => 'pesquisar',
        'es' => 'buscar',
    ],
    'product' => [
        'fr' => 'produit',
        'pt' => 'produto',
        'es' => 'producto',
    ],
    'category' => [
        'fr' => 'categorie-produit',
        'pt' => 'categoria-produto',
        'es' => 'categoria-producto',
    ],
    'shop.contact' => [
        'fr' => 'contactez-nous',
        'pt' => 'contate-nos',
        'es' => 'contactanos',
    ],
    'shop.shipping-policy' => [
        'fr' => 'politique-de-livraison',
        'pt' => 'politica-de-envio',
        'es' => 'politica-de-envios',
    ],
    'shop.return-policy' => [
        'fr' => 'politique-de-retour-et-remboursement',
        'pt' => 'politica-de-devolucao-e-reembolso',
        'es' => 'politica-de-devoluciones-y-reembolsos',
    ],
    'shop.payment-policy' => [
        'fr' => 'politique-de-paiement',
        'pt' => 'politica-de-pagamento',
        'es' => 'politica-de-pago',
    ],
    'shop.legal-notice' => [
        'fr' => 'mentions-legales',
        'pt' => 'aviso-legal',
        'es' => 'aviso-legal',
    ],
    'shop.terms-of-use' => [
        'fr' => 'conditions-generales-d-utilisation',
        'pt' => 'termos-e-condicoes-de-uso',
        'es' => 'condiciones-generales-de-uso-cgu',
    ],
    'shop.terms-of-sale' => [
        'fr' => 'conditions-generales-de-vente',
        'pt' => 'termos-e-condicoes-de-venda',
        'es' => 'condiciones-generales-de-venta',
    ],
    'shop.privacy-policy' => [
        'fr' => 'politique-de-confidentialite',
        'pt' => 'politica-de-privacidade',
        'es' => 'politica-de-privacidad',
    ],
    'shop.cookie-policy' => [
        'fr' => 'politique-de-cookies',
        'pt' => 'politica-de-cookies',
        'es' => 'politica-de-cookies',
    ],
    'shop.my-account' => [
        'fr' => 'mon-compte',
        'pt' => 'minha-conta',
        'es' => 'mi-cuenta',
    ],
    'shop.lost-password' => [
        'fr' => 'mon-compte/mot-de-passe-oublie',
        'pt' => 'minha-conta/senha-perdida',
        'es' => 'mi-cuenta/contrasena-olvidada',
    ],
    'password.reset' => [
        'fr' => 'mon-compte/reinitialiser-mot-de-passe',
        'pt' => 'minha-conta/redefinir-senha',
        'es' => 'mi-cuenta/restablecer-contrasena',
    ],
    'shop.carrito' => [
        'fr' => 'panier',
        'pt' => 'carrinho',
        'es' => 'carrito',
    ],
    'shop.checkout' => [
        'fr' => 'commande',
        'pt' => 'finalizar-compra',
        'es' => 'finalizar-compra',
    ],
    'shop.order-confirmation' => [
        'fr' => 'commande/confirmation',
        'pt' => 'finalizar-compra/pedido-recebido',
        'es' => 'finalizar-compra/pedido-recibido',
    ],
];
