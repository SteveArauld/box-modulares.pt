<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
    <channel>
        <title>{{ config('company.brand') }} — {{ config('app.name') }}</title>
        <link>{{ $appUrl }}</link>
        <description>{{ config('company.activity') }}</description>
        @foreach ($items as $item)
            <item>
                <g:id>{{ $item->id }}</g:id>
                <g:title><![CDATA[{!! $item->title !!}]]></g:title>
                <g:description><![CDATA[{!! $item->description !!}]]></g:description>
                <g:link>{{ $appUrl.'/'.$locale.'/'.config('route-translations.product.'.$locale).'/'.$item->slug }}</g:link>
                <g:image_link>{{ $appUrl.'/'.ltrim($item->imagePath, '/') }}</g:image_link>
                @foreach ($item->additionalImagePaths as $path)
                <g:additional_image_link>{{ $appUrl.'/'.ltrim($path, '/') }}</g:additional_image_link>
                @endforeach
                <g:availability>{{ $item->availability }}</g:availability>
                <g:price>{{ $item->price }}</g:price>
                @if ($item->salePrice)
                <g:sale_price>{{ $item->salePrice }}</g:sale_price>
                @endif
                <g:brand>{{ $item->brand }}</g:brand>
                <g:condition>{{ $item->condition }}</g:condition>
                @if ($item->mpn)
                <g:mpn>{{ $item->mpn }}</g:mpn>
                @endif
                @if ($item->identifierExistsNo)
                <g:identifier_exists>no</g:identifier_exists>
                @endif
                @if ($item->googleProductCategory)
                <g:google_product_category>{{ $item->googleProductCategory }}</g:google_product_category>
                @endif
                @if ($item->productType !== '')
                <g:product_type><![CDATA[{!! $item->productType !!}]]></g:product_type>
                @endif
                @if ($item->color)
                <g:color><![CDATA[{!! $item->color !!}]]></g:color>
                @endif
                @if ($item->customLabel0 !== '')
                <g:custom_label_0>{{ $item->customLabel0 }}</g:custom_label_0>
                @endif
                <g:custom_label_1>{{ $item->customLabel1 }}</g:custom_label_1>
                @foreach ($shippingZones as $zone)
                <g:shipping>
                    <g:country>{{ $zone }}</g:country>
                    <g:service>Standard</g:service>
                    <g:price>{{ $shippingFee }} EUR</g:price>
                    <g:min_handling_time>{{ $handlingMin }}</g:min_handling_time>
                    <g:max_handling_time>{{ $handlingMax }}</g:max_handling_time>
                    <g:min_transit_time>{{ $transitMin }}</g:min_transit_time>
                    <g:max_transit_time>{{ $transitMax }}</g:max_transit_time>
                </g:shipping>
                @endforeach
            </item>
        @endforeach
    </channel>
</rss>
