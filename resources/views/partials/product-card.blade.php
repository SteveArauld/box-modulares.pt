@php
    $productName = $product->translatedValue('name') ?? 'Producto';
    $productSlug = route('product', $product->translatedValue('slug'));
    $productImage = $product->cover_image ? asset($product->cover_image) : asset('wp-content/uploads/2026/07/01-fullsizerender-1024x1024-5b51ed90-024e-4ee8-af91-4c8759da177.jpeg');
    $hoverImage = $product->gallery->skip(1)->first()?->path;
    $productCategory = $product->categories->first();
@endphp
<div class="wd-product wd-col wd-hover-standard product-grid-item product type-product {{ $product->is_in_stock ? 'instock' : 'outofstock' }} {{ $product->is_purchasable ? 'purchasable' : '' }} product-type-simple"
    data-loop="{{ $loop->iteration ?? 1 }}" data-id="{{ $product->source_id }}">
    <div class="wd-product-wrapper product-wrapper">
        <div class="wd-product-thumb product-element-top wd-quick-shop">
            <a href="{{ $productSlug }}" class="wd-product-img-link product-image-link" tabindex="-1" aria-label="{{ $productName }}">
                <img loading="lazy" decoding="async" width="800" height="800" src="{{ $productImage }}" class="attachment-large size-large" alt="{{ $productName }}">
            </a>
            @if ($hoverImage)
                <div class="wd-product-img-hover hover-img"><img loading="lazy" decoding="async" src="{{ asset($hoverImage) }}" class="attachment-large size-large" alt="{{ $productName }}"></div>
            @endif
            @if ($product->on_sale)
                <div class="product-labels"><span class="product-label sale">{{ __('Oferta') }}</span></div>
            @endif
            <div class="wd-buttons wd-pos-r-t">
                <a href="#" class="wd-action-btn wd-style-icon wd-wishlist-btn js-favorite-btn" data-product_id="{{ $product->source_id }}" aria-label="{{ __('Añadir a favoritos') }}" title="{{ __('Añadir a favoritos') }}">
                    <svg viewBox="0 0 24 24"><path d="M12 21s-7.5-4.6-10-9.1C.5 8.4 2 4.5 5.7 4 8 3.7 10 4.9 12 7c2-2.1 4-3.3 6.3-3 3.7.5 5.2 4.4 3.7 7.9C19.5 16.4 12 21 12 21z"></path></svg>
                </a>
            </div>
        </div>
        <style>
            .product-element-bottom{
                padding: 16px;
            }
            </style>
        <div class="product-element-bottom">
            <h3 class="wd-entities-title"><a href="{{ $productSlug }}">{{ $productName }}</a></h3>
            @if ($productCategory)
                <div class="wd-product-cats"><a href="{{ route('category', $productCategory->translatedValue('slug')) }}" rel="tag">{{ $productCategory->translatedValue('name') }}</a></div>
            @endif
            <span class="price">
                @if ($product->on_sale && $product->regular_price > $product->price)
                    <del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">&euro;</span>{{ number_format($product->regular_price, 2, ',', '.') }}</bdi></span></del>
                    <ins>
                @endif
                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">&euro;</span>{{ number_format($product->price, 2, ',', '.') }}</bdi></span>
                @if ($product->on_sale && $product->regular_price > $product->price)
                    </ins>
                @endif
            </span>
            <div class="wd-add-btn wd-add-btn-replace">
                <a href="#" data-quantity="1"
                    class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop js-add-to-cart"
                    data-product_id="{{ $product->source_id }}"
                    data-product_sku="{{ $product->sku }}"
                    data-product_name="{{ $productName }}"
                    data-product_price="{{ $product->price }}"
                    data-product_image="{{ $productImage }}"
                    data-product_slug="{{ $productSlug }}"
                    aria-label="{{ __('Añadir al carrito: :product', ['product' => $productName]) }}"
                    rel="nofollow"
                    data-success_message="{{ __('«:product» se ha añadido a tu carrito', ['product' => $productName]) }}">
                    <span class="wd-action-icon"><span class="wd-check-icon"></span></span><span class="wd-action-text">{{ __('Añadir al carrito') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
