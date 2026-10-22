<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">

    {{-- Static pages --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('shop.index') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('shop.contact') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    {{-- Category pages --}}
    @foreach ($categories as $category)
    <url>
        <loc>{{ route('category', $category->getTranslation('slug', 'es', false)) }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        @foreach (['es','fr','pt','en','it','de'] as $lang)
            @php $altSlug = $category->getTranslation('slug', $lang, false); @endphp
            @if ($altSlug)
        <xhtml:link rel="alternate" hreflang="{{ $lang }}" href="{{ url('/') }}/{{ $lang }}/categoria-producto/{{ $altSlug }}"/>
            @endif
        @endforeach
    </url>
    @endforeach

    {{-- Product pages --}}
    @foreach ($products as $product)
    <url>
        <loc>{{ route('product', $product->getTranslation('slug', 'es', false)) }}</loc>
        <lastmod>{{ $product->updated_at->toDateString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
        @foreach (['es','fr','pt','en','it','de'] as $lang)
            @php $altSlug = $product->getTranslation('slug', $lang, false); @endphp
            @if ($altSlug)
        <xhtml:link rel="alternate" hreflang="{{ $lang }}" href="{{ url('/') }}/{{ $lang }}/producto/{{ $altSlug }}"/>
            @endif
        @endforeach
    </url>
    @endforeach

</urlset>
