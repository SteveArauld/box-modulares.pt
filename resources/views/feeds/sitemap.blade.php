<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">

    @php $locales = \App\Http\Middleware\SetLocale::SUPPORTED_LOCALES; @endphp

    {{-- Static pages, one entry per locale --}}
    @foreach ($locales as $lang)
        @foreach (['home', 'shop.index', 'shop.contact', 'shop.shipping-policy', 'shop.return-policy', 'shop.payment-policy', 'shop.legal-notice', 'shop.terms-of-use', 'shop.terms-of-sale', 'shop.privacy-policy', 'shop.cookie-policy'] as $pageName)
    <url>
        <loc>{{ lroute($pageName, [], true, $lang) }}</loc>
        <changefreq>{{ $pageName === 'home' || $pageName === 'shop.index' ? 'daily' : 'monthly' }}</changefreq>
        <priority>{{ $pageName === 'home' ? '1.0' : ($pageName === 'shop.index' ? '0.9' : '0.5') }}</priority>
        @foreach ($locales as $altLang)
        <xhtml:link rel="alternate" hreflang="{{ $altLang }}" href="{{ lroute($pageName, [], true, $altLang) }}"/>
        @endforeach
    </url>
        @endforeach
    @endforeach

    {{-- Category pages --}}
    @foreach ($categories as $category)
    <url>
        <loc>{{ lroute('category', $category->getTranslation('slug', 'es', false), true, 'es') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        @foreach ($locales as $lang)
            @php $altSlug = $category->getTranslation('slug', $lang, false); @endphp
            @if ($altSlug)
        <xhtml:link rel="alternate" hreflang="{{ $lang }}" href="{{ lroute('category', $altSlug, true, $lang) }}"/>
            @endif
        @endforeach
    </url>
    @endforeach

    {{-- Product pages --}}
    @foreach ($products as $product)
    <url>
        <loc>{{ lroute('product', $product->getTranslation('slug', 'es', false), true, 'es') }}</loc>
        <lastmod>{{ $product->updated_at->toDateString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
        @foreach ($locales as $lang)
            @php $altSlug = $product->getTranslation('slug', $lang, false); @endphp
            @if ($altSlug)
        <xhtml:link rel="alternate" hreflang="{{ $lang }}" href="{{ lroute('product', $altSlug, true, $lang) }}"/>
            @endif
        @endforeach
    </url>
    @endforeach

</urlset>
