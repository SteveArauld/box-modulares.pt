@extends('layouts.app')

@section('title', ($product->translatedValue('name') ?? 'Producto').' | '.config('app.name'))
@section('body_class', 'single-product single product page')

@push('styles')
    <link rel='stylesheet' href='{{ asset('assets/css/product.css') }}?v={{ filemtime(public_path('assets/css/product.css')) }}' media='all' />
    {{-- CORRECTION ICI : Ajout des guillemets autour de asset() --}}
    <link rel='stylesheet' href="{{ asset('/wp-content/themes/woodmart/css/parts/lib-photoswipe8833.css') }}" media='all' />
    
    <style>
        /* =========================================================
           STYLES DESKTOP (GRID 2 COLONNES + ZOOM + BADGE)
           ========================================================= */
        .mm-force-grid .woocommerce-product-gallery__wrapper {
            display: grid !important;
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 20px !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .mm-force-grid .wd-carousel-wrap {
            display: contents !important;
        }

        .mm-force-grid .wd-carousel-item {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            float: none !important;
            display: block !important;
            position: relative !important;
            left: auto !important;
            transform: none !important;
        }

        .mm-force-grid img {
            width: 100% !important;
            height: auto !important;
            aspect-ratio: 4 / 3 !important;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .mm-force-grid .wd-carousel-item:hover img {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            z-index: 2;
        }

        .mm-force-grid .wd-nav-arrows {
            display: none !important;
        }

        .product-label.onsale {
            position: absolute !important;
            top: 15px !important;
            right: 15px !important;
            left: auto !important;
            background-color: #333 !important;
            color: #fff !important;
            font-weight: 700;
            font-size: 14px;
            padding: 6px 12px;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            text-transform: uppercase;
            z-index: 10;
            line-height: 1;
        }

        .wd-single-price .price {
            font-size: 32px !important;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .wd-single-price .price del {
            font-size: 24px;
            color: #999;
            text-decoration: line-through;
        }
        .wd-single-price .price ins {
            font-size: 32px;
            color: #e74c3c;
            text-decoration: none;
            font-weight: 800;
        }

        .wd-products-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }
        
        .wd-product-nav-btn {
            width: 36px;
            height: 36px;
            border: 1px solid #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            transition: all 0.3s ease;
            background: #fff;
            cursor: pointer;
            position: relative;
        }
        .wd-product-nav-btn:hover {
            background: #f0f0f0;
            border-color: #bbb;
        }
        .wd-product-nav-btn svg {
            width: 16px;
            height: 16px;
        }

        .wd-event-hover {
            position: relative;
            display: inline-block;
        }

        .wd-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 10px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            width: 320px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 100;
            border: 1px solid #eee;
        }

        .wd-event-hover:hover .wd-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .wd-dropdown .wd-product-nav-thumb img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
        }

        .wd-dropdown .wd-product-nav-desc {
            flex: 1;
        }

        .wd-dropdown .wd-entities-title {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
            line-height: 1.2;
        }

        .wd-dropdown .price {
            font-size: 14px;
            color: #e74c3c;
            font-weight: 700;
            display: block;
        }
        .wd-dropdown .price del {
            font-size: 12px;
            color: #999;
            margin-right: 5px;
        }

        /* =========================================================
           CORRECTION MOBILE
           ========================================================= */
        @media (max-width: 768px) {
            .mm-mobile-hide-column {
                display: none !important;
            }

            .wd-sticky-container-md-sm {
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                padding: 20px !important;
                border: 1px solid #e74c3c !important;
                border-radius: 12px !important;
                background: #fff !important;
            }

            /* Carrousel mobile */
            .mm-mobile-gallery-in-card .woocommerce-product-gallery__wrapper {
                display: block !important;
                grid-template-columns: none !important;
                gap: 0 !important;
            }
            
            .mm-mobile-gallery-in-card .wd-carousel-wrap {
                display: flex !important;
            }

            .mm-mobile-gallery-in-card .wd-carousel-item {
                width: 100% !important;
                flex: 0 0 100% !important;
            }

            .mm-mobile-gallery-in-card .wd-nav-arrows {
                display: flex !important; 
            }

            .mm-mobile-gallery-in-card img {
                width: 100% !important;
                height: auto !important;
                aspect-ratio: 4 / 3 !important;
                object-fit: cover;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            }

            /* Prix */
            .wd-single-price .price {
                font-size: 26px !important;
                gap: 10px;
            }
            .wd-single-price .price del {
                font-size: 18px;
            }
            .wd-single-price .price ins {
                font-size: 26px;
            }

            /* --- CORRECTION DISPOSITION DES BOUTONS (Ligne unique) --- */
            .mm-product-actions-row {
                display: flex !important;
                flex-direction: row !important; /* Alignement horizontal */
                flex-wrap: nowrap !important; /* Pas de retour à la ligne */
                gap: 8px !important;
                width: 100% !important;
                align-items: center !important;
            }

            /* Le champ quantité prend 25% de la largeur */
            .mm-product-actions-row .quantity {
                width: 25% !important;
                flex: 0 0 25% !important;
                display: flex !important;
                justify-content: space-between !important;
                align-items: center !important;
                margin-bottom: 0 !important;
                height: 40px;
            }
            .mm-product-actions-row .quantity input.qty {
                flex: 1;
                text-align: center;
                padding: 0 !important;
                height: 100% !important;
                border: none !important;
                background: transparent !important;
            }
            .mm-product-actions-row .quantity .minus,
            .mm-product-actions-row .quantity .plus {
                background: transparent !important;
                border: none !important;
                color: #333 !important;
                font-size: 16px !important;
                padding: 0 5px !important;
            }

            /* Les boutons Ajouter et Acheter prennent le reste de la place */
            .mm-product-actions-row .single_add_to_cart_button,
            .mm-product-actions-row .js-buy-now {
                flex: 1 !important; /* Prend tout l'espace restant */
                width: auto !important;
                text-align: center !important;
                margin-bottom: 0 !important;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px !important; /* Texte plus petit pour tenir */
                padding: 0 5px !important;
            }
            
            .mm-product-actions-row .mm-wishlist-btn {
                display: none !important;
            }

            /* Description dans la carte mobile */
            .mm-mobile-description-in-card {
                margin-top: 30px;
                border-top: 1px solid #eee;
                padding-top: 20px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.woocommerce-product-gallery').forEach(function (gallery) {
                var widget = gallery.closest('.elementor-widget-wd_single_product_gallery') || gallery;
                if (getComputedStyle(widget).display === 'none') {
                    widget.remove();
                }
            });

            function rearrangeMobileLayout() {
                var isMobile = window.matchMedia("(max-width: 768px)").matches;
                
                var galleryWidget = document.querySelector('.elementor-element-7150805');
                var descriptionWidget = document.querySelector('.elementor-element-b6075ab');
                var targetTitle = document.querySelector('.wd-single-title');
                var rightColumn = document.querySelector('.wd-sticky-container-md-sm');
                var accordions = document.querySelector('.elementor-element-de5be03');
                var leftColumn = document.querySelector('.elementor-element-6a50c46');
                
                if (!galleryWidget || !targetTitle || !rightColumn) return;

                if (isMobile) {
                    if (leftColumn) leftColumn.classList.add('mm-mobile-hide-column');

                    // Déplacer la galerie
                    if (!galleryWidget.classList.contains('mm-mobile-gallery-in-card')) {
                        targetTitle.parentNode.insertBefore(galleryWidget, targetTitle.nextSibling);
                        galleryWidget.classList.add('mm-mobile-gallery-in-card');
                    }

                    // Déplacer la description
                    if (descriptionWidget && accordions) {
                        if (!descriptionWidget.classList.contains('mm-mobile-description-in-card')) {
                            accordions.parentNode.insertBefore(descriptionWidget, accordions.nextSibling);
                            descriptionWidget.classList.add('mm-mobile-description-in-card');
                        }
                    }

                    // --- REINITIALISATION DU CARROUSEL SLICK (Pour que les flèches fonctionnent) ---
                    setTimeout(function() {
                        if (typeof jQuery !== 'undefined' && jQuery.fn.slick) {
                            var $carousel = jQuery('.mm-mobile-gallery-in-card .wd-carousel');
                            if ($carousel.length) {
                                // On détruit et on recrée le carrousel pour être sûr qu'il fonctionne
                                if ($carousel.hasClass('slick-initialized')) {
                                    $carousel.slick('unslick');
                                }
                                // On récupère les options du thème (flèches, etc.)
                                $carousel.slick({
                                    infinite: true,
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: true,
                                    dots: false,
                                    adaptiveHeight: true
                                });
                            }
                        }
                    }, 200); // Délai pour laisser le DOM se mettre à jour

                } else {
                    if (leftColumn) leftColumn.classList.remove('mm-mobile-hide-column');
                    
                    if (galleryWidget.classList.contains('mm-mobile-gallery-in-card')) {
                        leftColumn.insertBefore(galleryWidget, leftColumn.firstChild);
                        galleryWidget.classList.remove('mm-mobile-gallery-in-card');
                    }

                    if (descriptionWidget && descriptionWidget.classList.contains('mm-mobile-description-in-card')) {
                        leftColumn.appendChild(descriptionWidget);
                        descriptionWidget.classList.remove('mm-mobile-description-in-card');
                    }
                }
            }

            rearrangeMobileLayout();
            window.addEventListener('resize', rearrangeMobileLayout);

            window.mmLightboxLabels = {
                fullscreen: @json(__('Pantalla completa')),
                share: @json(__('Compartir')),
                close: @json(__('Cerrar')),
                prev: @json(__('Imagen anterior')),
                next: @json(__('Imagen siguiente')),
                linkCopied: @json(__('Enlace copiado')),
            };
        });
    </script>
@endpush

@section('content')
    <main id="main-content" class="wd-content-layout content-layout-wrapper container wd-builder-on" role="main">
        <div class="wd-content-area site-content">
            <div id="product-6807"
                class="single-product-page entry-content product type-product post-6807 status-publish first instock product_cat-casa-movil-y-prefabricada has-post-thumbnail sale shipping-taxable purchasable product-type-simple">

                <div data-elementor-type="wp-post" data-elementor-id="1824" class="elementor elementor-1824">
                    
                    {{-- BREADCRUMBS + NAVIGATION --}}
                    <div class="wd-negative-gap elementor-element elementor-element-e8dc27d e-flex e-con-boxed e-con e-parent e-lazyloaded"
                        data-id="e8dc27d" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-4db3b22 wd-el-breadcrumbs text-left elementor-widget elementor-widget-wd_wc_breadcrumb"
                                data-id="4db3b22" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_wc_breadcrumb.default">
                                <div class="elementor-widget-container">
                                    <nav class="wd-breadcrumbs woocommerce-breadcrumb" aria-label="{{ __('Breadcrumb') }}"> <a
                                            href="{{ route('home') }}">
                                            {{ __('Inicio') }} </a>
                                        @if ($product->category)
                                            <span class="wd-delimiter">•</span> <a
                                                href="{{ route('category', $product->category->translatedValue('slug')) }}" class="wd-last-link">
                                                {{ $product->category->translatedValue('name') }} </a>
                                        @endif
                                        <span class="wd-delimiter">•</span> <span class="wd-last">
                                            {{ $product->translatedValue('name') }} </span>
                                    </nav>
                                </div>
                            </div>
                            
                            {{-- NAVIGATION --}}
                            <div class="elementor-element elementor-element-3273d56 wd-single-nav text-left elementor-widget elementor-widget-wd_single_product_nav"
                                data-id="3273d56" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_single_product_nav.default">
                                <div class="elementor-widget-container">
                                    <div class="wd-products-nav">
                                        @if ($previousProduct)
                                            <div class="wd-event-hover">
                                                <a class="wd-product-nav-btn wd-btn-prev"
                                                    href="{{ route('product', $previousProduct->translatedValue('slug')) }}"
                                                    aria-label="{{ __('Producto anterior') }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                                    </svg>
                                                </a>
                                                <div class="wd-dropdown">
                                                    <a href="{{ route('product', $previousProduct->translatedValue('slug')) }}" class="wd-product-nav-thumb">
                                                        <img width="150" height="150"
                                                            src="{{ $previousProduct->cover_image ? asset($previousProduct->cover_image) : '' }}"
                                                            class="attachment-thumbnail size-thumbnail"
                                                            alt="{{ $previousProduct->translatedValue('name') }}" decoding="async"> </a>
                                                    <div class="wd-product-nav-desc">
                                                        <a href="{{ route('product', $previousProduct->translatedValue('slug')) }}"
                                                            class="wd-entities-title">
                                                            {{ $previousProduct->translatedValue('name') }} </a>
                                                        <span class="price">
                                                            @if ($previousProduct->on_sale && $previousProduct->regular_price > $previousProduct->price)
                                                                <del><span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"
                                                                                translate="no">€</span>{{ number_format($previousProduct->regular_price, 2, ',', '.') }}</bdi></span></del>
                                                                <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"
                                                                                translate="no">€</span>{{ number_format($previousProduct->price, 2, ',', '.') }}</bdi></span></ins>
                                                            @else
                                                                <span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"
                                                                                translate="no">€</span>{{ number_format($previousProduct->price, 2, ',', '.') }}</bdi></span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <a href="{{ route('shop.index') }}" class="wd-product-nav-btn wd-btn-back" title="{{ __('Volver a productos') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                            </svg>
                                        </a>

                                        @if ($nextProduct)
                                            <div class="wd-event-hover">
                                                <a class="wd-product-nav-btn wd-btn-next"
                                                    href="{{ route('product', $nextProduct->translatedValue('slug')) }}"
                                                    aria-label="{{ __('Siguiente producto') }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </a>
                                                <div class="wd-dropdown">
                                                    <a href="{{ route('product', $nextProduct->translatedValue('slug')) }}" class="wd-product-nav-thumb">
                                                        <img width="150" height="150"
                                                            src="{{ $nextProduct->cover_image ? asset($nextProduct->cover_image) : '' }}"
                                                            class="attachment-thumbnail size-thumbnail"
                                                            alt="{{ $nextProduct->translatedValue('name') }}" decoding="async"> </a>
                                                    <div class="wd-product-nav-desc">
                                                        <a href="{{ route('product', $nextProduct->translatedValue('slug')) }}"
                                                            class="wd-entities-title">
                                                            {{ $nextProduct->translatedValue('name') }} </a>
                                                        <span class="price">
                                                            @if ($nextProduct->on_sale && $nextProduct->regular_price > $nextProduct->price)
                                                                <del><span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"
                                                                                translate="no">€</span>{{ number_format($nextProduct->regular_price, 2, ',', '.') }}</bdi></span></del>
                                                                <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"
                                                                                translate="no">€</span>{{ number_format($nextProduct->price, 2, ',', '.') }}</bdi></span></ins>
                                                            @else
                                                                <span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"
                                                                                translate="no">€</span>{{ number_format($nextProduct->price, 2, ',', '.') }}</bdi></span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wd-negative-gap elementor-element elementor-element-a36074d e-flex e-con-boxed e-con e-parent e-lazyloaded"
                        data-id="a36074d" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-b03391e wd-wc-notices elementor-widget elementor-widget-wd_wc_notices"
                                data-id="b03391e" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_wc_notices.default">
                                <div class="elementor-widget-container">
                                    <div class="woocommerce-notices-wrapper"></div>
                                </div>
                            </div>
                            
                            {{-- CONTENEUR PRINCIPAL --}}
                            <div class="elementor-element elementor-element-95e239d e-con-full e-flex e-con e-child"
                                data-id="95e239d" data-element_type="container" data-e-type="container">
                                
                                {{-- COLONNE GAUCHE --}}
                                <div class="elementor-element elementor-element-6a50c46 e-con-full e-flex e-con e-child"
                                    data-id="6a50c46" data-element_type="container" data-e-type="container">
                                    
                                    {{-- GALERIE D'IMAGES --}}
                                    <div class="elementor-element elementor-element-7150805 wd-single-gallery elementor-widget-theme-post-content elementor-widget elementor-widget-wd_single_product_gallery mm-force-grid"
                                        data-id="7150805" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_single_product_gallery.default">
                                        <div class="elementor-widget-container">
                                            <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images wd-has-thumb thumbs-grid-bottom_column images image-action-zoom"
                                                style="opacity: 1;">
                                                <div class="wd-carousel-container wd-gallery-images wd-off-lg">
                                                    <div class="wd-carousel-inner">

                                                        @if ($product->on_sale && $product->regular_price > 0)
                                                            <div class="product-labels labels-rounded-sm">
                                                                <span class="onsale product-label wd-shape-round-sm">
                                                                    -{{ ceil((1 - $product->price / $product->regular_price) * 100) }}%
                                                                </span>
                                                            </div>
                                                        @endif

                                                        <figure class="woocommerce-product-gallery__wrapper wd-carousel wd-grid">
                                                            <div class="wd-carousel-wrap">
                                                                @foreach ($product->gallery as $image)
                                                                    <div class="wd-carousel-item">
                                                                        <figure data-thumb="{{ asset($image->path) }}"
                                                                            data-thumb-alt="{{ $product->translatedValue('name') }}"
                                                                            class="woocommerce-product-gallery__image">
                                                                            <a data-elementor-open-lightbox="no"
                                                                                href="{{ asset($image->path) }}">
                                                                                <img width="580" height="435"
                                                                                    src="{{ asset($image->path) }}"
                                                                                    alt="{{ $product->translatedValue('name') }}"
                                                                                    data-caption=""
                                                                                    data-src="{{ asset($image->path) }}"
                                                                                    data-large_image="{{ asset($image->path) }}"
                                                                                    data-large_image_width="580"
                                                                                    data-large_image_height="435"
                                                                                    decoding="async" loading="lazy">
                                                                            </a>
                                                                        </figure>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </figure>

                                                        <div class="wd-nav-arrows wd-pos-sep wd-hover-1 wd-custom-style wd-icon-1">
                                                            <div class="wd-btn-arrow wd-prev"><div class="wd-arrow-inner"></div></div>
                                                            <div class="wd-btn-arrow wd-next"><div class="wd-arrow-inner"></div></div>
                                                        </div>

                                                        <div class="product-additional-galleries">
                                                            <div class="wd-show-product-gallery-wrap wd-action-btn wd-style-icon-bg-text wd-gallery-btn">
                                                                <a href="#" rel="nofollow" class="woodmart-show-product-gallery">
                                                                    <span class="wd-action-icon"></span>
                                                                    <span class="wd-action-text">
                                                                        {{ __('Haga clic para ampliar') }} </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- DESCRIPTION --}}
                                    <div class="elementor-element elementor-element-b6075ab e-con-full e-flex e-con e-child"
                                        data-id="b6075ab" data-element_type="container" data-e-type="container"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-element elementor-element-2f22a65 wd-width-100 elementor-widget elementor-widget-wd_title"
                                            data-id="2f22a65" data-element_type="widget" data-e-type="widget"
                                            data-widget_type="wd_title.default">
                                            <div class="elementor-widget-container">
                                                <div class="title-wrapper wd-set-mb reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">
                                                    <div class="liner-continer">
                                                        <h4 class="woodmart-title-container title wd-fontsize-l">
                                                            {{ __('Descripción') }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-adb4929 wd-single-content elementor-widget elementor-widget-wd_single_product_content"
                                            data-id="adb4929" data-element_type="widget" data-e-type="widget"
                                            data-widget_type="wd_single_product_content.default">
                                            <div class="elementor-widget-container">
                                                {!! $product->translatedValue('description') !!}
                                            </div>
                                        </div>
                                        @if (!empty($product->attributes))
                                            <div class="elementor-element elementor-element-f1a04a2 wd-single-attrs wd-layout-list wd-style-bordered elementor-widget elementor-widget-wd_single_product_additional_info_table"
                                                data-id="f1a04a2" data-element_type="widget" data-e-type="widget"
                                                data-widget_type="wd_single_product_additional_info_table.default">
                                                <div class="elementor-widget-container">
                                                    <h4 class="wd-el-title title element-title">
                                                        <span class="title-text">
                                                            {{ __('Additional information​') }} </span>
                                                    </h4>
                                                    <table class="woocommerce-product-attributes shop_attributes">
                                                        @foreach ($product->attributes as $attribute)
                                                            <tr>
                                                                <th>{{ $attribute['name'] }}</th>
                                                                <td>{{ collect($attribute['terms'] ?? [])->pluck('name')->join(', ') }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            
                                {{-- COLONNE DROITE (La Carte) --}}
                                <div class="wd-sticky-container-lg wd-sticky-container-md-sm elementor-element elementor-element-032025e e-con-full e-flex e-con e-child"
                                    data-id="032025e" data-element_type="container" data-e-type="container"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    
                                    <div class="elementor-element elementor-element-cd3f1cf wd-single-title text-left elementor-widget elementor-widget-wd_single_product_title"
                                        data-id="cd3f1cf" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_single_product_title.default">
                                        <div class="elementor-widget-container">
                                            <h1 class="product_title entry-title wd-entities-title">
                                                {{ $product->translatedValue('name') }}
                                            </h1>
                                        </div>
                                    </div>
                                    
                                    {{-- PRIX --}}
                                    <div class="elementor-element elementor-element-48be7f7 wd-single-price text-left elementor-widget elementor-widget-wd_single_product_price"
                                        data-id="48be7f7" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_single_product_price.default">
                                        <div class="elementor-widget-container">
                                            <p class="price">
                                                @if ($product->on_sale && $product->regular_price > $product->price)
                                                    <del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">€</span>{{ number_format($product->regular_price, 2, ',', '.') }}</bdi></span></del>
                                                    <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">€</span>{{ number_format($product->price, 2, ',', '.') }}</bdi></span></ins>
                                                @else
                                                    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">€</span>{{ number_format($product->price, 2, ',', '.') }}</bdi></span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    
                                    {{-- BOUTONS --}}
                                    <div class="elementor-element elementor-element-74225da wd-btn-design-full wd-single-add-cart text-left wd-atc-btn-style-default wd-bn-btn-style-default wd-design-default wd-swatch-layout-default elementor-widget elementor-widget-wd_single_product_add_to_cart"
                                        data-id="74225da" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_single_product_add_to_cart.default">
                                        <div class="elementor-widget-container">

                                            @php
                                                $whatsappMessage = __('¡Hola! Me interesa el producto: :product. ¿Podéis darme más información?', ['product' => $product->translatedValue('name')]);
                                            @endphp

                                            <a href="https://wa.me/34603547522?text={{ urlencode($whatsappMessage) }}"
                                                target="_blank" rel="noopener noreferrer"
                                                class="pellets-wa-product-btn"
                                                aria-label="{{ __('Consultar por WhatsApp') }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" width="20" height="20"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z">
                                                    </path>
                                                    <path
                                                        d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.116 1.526 5.845L.057 23.926a.5.5 0 0 0 .612.612l6.081-1.469A11.934 11.934 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.9a9.878 9.878 0 0 1-5.031-1.374l-.36-.214-3.733.902.918-3.646-.235-.375A9.867 9.867 0 0 1 2.1 12C2.1 6.534 6.534 2.1 12 2.1S21.9 6.534 21.9 12 17.466 21.9 12 21.9z">
                                                    </path>
                                                </svg><span>{{ __('Consultar por WhatsApp') }}</span></a>

                                            <form class="cart mm-product-actions-row"
                                                action="{{ route('product', $product->translatedValue('slug')) }}" method="post" enctype="multipart/form-data">

                                                <div class="quantity">
                                                    <input type="button" value="-" class="minus btn"
                                                        aria-label="{{ __('Disminuir cantidad') }}">
                                                    <label class="screen-reader-text" for="quantity_6ac4b81f50b53">{{ __(':product cantidad', ['product' => $product->translatedValue('name')]) }}</label>
                                                    <input type="number" id="quantity_6ac4b81f50b53"
                                                        class="input-text qty text" value="1"
                                                        aria-label="{{ __('Cantidad de productos') }}" min="1"
                                                        name="quantity" step="1" placeholder=""
                                                        inputmode="numeric" autocomplete="off">
                                                    <input type="button" value="+" class="plus btn"
                                                        aria-label="{{ __('Aumentar cantidad') }}">
                                                </div>

                                                <a href="#" class="js-add-to-cart single_add_to_cart_button button alt"
                                                    data-product_id="{{ $product->source_id }}"
                                                    data-product_sku="{{ $product->sku }}"
                                                    data-product_name="{{ $product->translatedValue('name') }}"
                                                    data-product_price="{{ $product->price }}"
                                                    data-product_image="{{ $product->cover_image ? asset($product->cover_image) : '' }}"
                                                    data-product_slug="{{ route('product', $product->translatedValue('slug')) }}"
                                                    data-success_message="{{ __('«:product» se ha añadido a tu carrito', ['product' => $product->translatedValue('name')]) }}">{{ __('Añadir Al Carrito') }}</a>

                                                <a href="#" class="js-buy-now wd-buy-now-btn button alt"
                                                    data-product_id="{{ $product->source_id }}"
                                                    data-product_sku="{{ $product->sku }}"
                                                    data-product_name="{{ $product->translatedValue('name') }}"
                                                    data-product_price="{{ $product->price }}"
                                                    data-product_image="{{ $product->cover_image ? asset($product->cover_image) : '' }}"
                                                    data-product_slug="{{ route('product', $product->translatedValue('slug')) }}">{{ __('Comprar Ahora') }}</a>

                                                <a href="#" class="mm-wishlist-btn js-favorite-btn wd-single-favorite-wrap" data-product_id="{{ $product->source_id }}" aria-label="{{ __('Añadir a favoritos') }}" title="{{ __('Añadir a favoritos') }}">
                                                    <svg viewBox="0 0 24 24"><path d="M12 21s-7.5-4.6-10-9.1C.5 8.4 2 4.5 5.7 4 8 3.7 10 4.9 12 7c2-2.1 4-3.3 6.3-3 3.7.5 5.2 4.4 3.7 7.9C19.5 16.4 12 21 12 21z"></path></svg>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    {{-- ACCORDÉONS --}}
                                    <div class="elementor-element elementor-element-de5be03 elementor-widget elementor-widget-wd_accordion"
                                        data-id="de5be03" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_accordion.default">
                                        <div class="elementor-widget-container">
                                            <div class="wd-accordion wd-style-shadow wd-titles-left wd-opener-pos-right wd-opener-style-plus"
                                                data-state="all_closed">

                                                <div class="wd-accordion-item">
                                                    <div class="wd-accordion-title wd-role-btn" data-accordion-index="0"
                                                        tabindex="0">
                                                        <div class="wd-accordion-title-text">
                                                            <span>
                                                                {{ __('Garantía de calidad') }} </span>
                                                        </div>
                                                        <span class="wd-accordion-opener"></span>
                                                    </div>
                                                    <div class="wd-accordion-content wd-entry-content"
                                                        data-accordion-index="0">
                                                        <p>{{ __('Todos nuestros productos están cubiertos por la garantía legal vigente. Si recibe un artículo defectuoso o que no corresponde con su pedido, nuestro equipo le ofrecerá una solución rápida, ya sea mediante reparación, sustitución o reembolso, según corresponda.') }}</p>
                                                    </div>
                                                </div>

                                                <div class="wd-accordion-item">
                                                    <div class="wd-accordion-title wd-role-btn" data-accordion-index="1"
                                                        tabindex="0">
                                                        <div class="wd-accordion-title-text">
                                                            <span>
                                                                {{ __('Envío gratuito y devoluciones sencillas') }} </span>
                                                        </div>
                                                        <span class="wd-accordion-opener"></span>
                                                    </div>
                                                    <div class="wd-accordion-content wd-entry-content"
                                                        data-accordion-index="1">
                                                        <p>{{ __('Ofrecemos') }} <strong>{{ __('envío gratuito') }}</strong> {{ __('en todos los pedidos. Si desea devolver un producto, dispone de') }} <strong>{{ __('14 días naturales') }}</strong> {{ __('desde su recepción para ejercer su derecho de desistimiento, siempre que el artículo se encuentre en su estado original y cumpla las condiciones de devolución.') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="wd-accordion-item">
                                                    <div class="wd-accordion-title wd-role-btn" data-accordion-index="2"
                                                        tabindex="0">
                                                        <div class="wd-accordion-title-text">
                                                            <span>
                                                                {{ __('Reembolso rápido y seguro') }} </span>
                                                        </div>
                                                        <span class="wd-accordion-opener"></span>
                                                    </div>
                                                    <div class="wd-accordion-content wd-entry-content"
                                                        data-accordion-index="2">
                                                        <p>{{ __('Una vez recibida e inspeccionada la devolución, el reembolso se efectuará utilizando el mismo método de pago empleado en la compra. El proceso se realizará dentro de los plazos establecidos por la legislación vigente.') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection