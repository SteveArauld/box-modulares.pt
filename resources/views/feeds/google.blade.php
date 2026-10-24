<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
    <channel>
        <title>{{ config('company.brand') }} — {{ config('app.name') }}</title>
        <link>{{ $appUrl }}</link>
        <description>{{ config('company.activity') }}</description>
        @foreach ($products as $product)
            @php
                $slug       = $product->getTranslation('slug', $locale, false) ?: $product->getTranslation('slug', 'es', false);
                $name       = $product->getTranslation('name', $locale, false) ?: $product->getTranslation('name', 'es', false);
                $shortDesc  = strip_tags($product->getTranslation('short_description', $locale, false) ?: $product->getTranslation('short_description', 'es', false) ?: '');
                $productSegment = config('route-translations.product.'.$locale, 'producto');
                $link       = $appUrl . '/' . $locale . '/' . $productSegment . '/' . $slug;
                $coverImage = $product->cover_image ? rtrim($appUrl, '/') . '/' . ltrim($product->cover_image, '/') : null;
                $price      = number_format($product->price, 2, '.', '');
                $regularPrice = number_format($product->regular_price, 2, '.', '');
                $condition  = $product->condition ?? 'new';

                // Category Spanish slug for GMC mapping
                $catSlugEs  = $product->category?->getTranslation('slug', 'es', false) ?? '';
                $gmcCatMap  = [
                    'contenedores-maritimos'               => 5842,
                    'contenedores-de-envio'                => 5842,
                    'contenedores-maritimos-de-20-pies'    => 5842,
                    'contenedores-maritimos-de-40-pies'    => 5842,
                    'casas-modulares'                      => 696,
                    'casas-moviles'                        => 696,
                    'casas-moviles-prefabricadas'          => 696,
                    'casetas-de-obra-y-modulos-sanitarios' => 696,
                    'bar-contenedor'                       => 5842,
                    'piscina-contenedor'                   => 2901,
                    'plataformas-elevadoras'               => 1810,
                ];
                $gmcCatId   = $gmcCatMap[$catSlugEs] ?? 5842;
                $catName    = $product->category?->getTranslation('name', $locale, false) ?: $product->category?->getTranslation('name', 'es', false) ?: '';

                $shippingFee  = number_format((float) config('company.shipping.fee', 350), 2, '.', '');
                $shippingZones = config('company.shipping.zones', ['PT', 'ES']);
            @endphp
            @if ($slug && $name && $coverImage && $price > 0)
            <item>
                <g:id>{{ $product->sku ?: 'prod-' . $product->id }}</g:id>
                <g:title><![CDATA[{{ $name }}]]></g:title>
                <g:description><![CDATA[{{ $shortDesc }}]]></g:description>
                <g:link>{{ $link }}</g:link>
                <g:image_link>{{ $coverImage }}</g:image_link>
                @foreach ($product->gallery->skip(1)->take(9) as $img)
                <g:additional_image_link>{{ rtrim($appUrl, '/') . '/' . ltrim($img->path, '/') }}</g:additional_image_link>
                @endforeach
                <g:availability>in_stock</g:availability>
                <g:price>{{ $price }} EUR</g:price>
                @if ($product->on_sale && $product->regular_price > $product->price)
                <g:sale_price>{{ $price }} EUR</g:sale_price>
                <g:sale_price_effective_date>{{ now()->toDateString() }}/{{ now()->addYear()->toDateString() }}</g:sale_price_effective_date>
                @endif
                <g:brand>{{ config('company.brand') }}</g:brand>
                <g:condition>{{ $condition }}</g:condition>
                <g:mpn>{{ $product->sku ?: 'GSC-' . $product->id }}</g:mpn>
                <g:identifier_exists>no</g:identifier_exists>
                <g:google_product_category>{{ $gmcCatId }}</g:google_product_category>
                <g:product_type><![CDATA[{{ $catName }}]]></g:product_type>
                @foreach ($shippingZones as $zone)
                <g:shipping>
                    <g:country>{{ $zone }}</g:country>
                    <g:service>Standard</g:service>
                    <g:price>{{ $shippingFee }} EUR</g:price>
                </g:shipping>
                @endforeach
            </item>
            @endif
        @endforeach
    </channel>
</rss>
