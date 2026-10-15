<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    
    <meta charset="UTF-8">
    <base href="{{ url('/') }}/">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/logo/favicon.svg') }}">


    <link rel='stylesheet' id='fluentform-elementor-widget-css'
        href={{ asset('/wp-content/plugins/fluentform/assets/css/fluent-forms-elementor-widgetd7df.css') }} media='all' />

    <link rel='stylesheet' id='hostinger-reach-subscription-block-css'
        href={{ asset('/wp-content/plugins/hostinger-reach/frontend/dist/blocks/subscription29b3.css') }} media='all' />

    <link rel='stylesheet' id='hero_styles-css'
        href={{ asset('/wp-content/plugins/woocommerce-gateway-hero/assets/css/hero-stylesb95e.css') }} media='all' />


    <link rel='stylesheet' id='elementor-frontend-css'
        href={{ asset('/wp-content/uploads/elementor/css/custom-frontend.min05b2.css') }} media='all' />

    <link rel='stylesheet' id='elementor-post-6-css' href={{ asset('/wp-content/uploads/elementor/css/post-605b2.css') }}
        media='all' />
    <link rel='stylesheet' id='widget-image-css'
        href={{ asset('/wp-content/plugins/elementor/assets/css/widget-image.min4189.css') }} media='all' />
    <link rel='stylesheet' id='elementor-post-120-css' href={{ asset('/wp-content/uploads/elementor/css/post-1204eb8.css') }}
        media='all' />



    <link rel='stylesheet' id='base-desktop-css' href={{ asset('/wp-content/uploads/elementor/css/base-desktopa49e.css') }}
        media='all' />
    <link rel='stylesheet' id='base-mobile-css' href={{ asset('/wp-content/uploads/elementor/css/base-mobilea49e.css') }}
        media='(max-width:768px)' />
    <link rel='stylesheet' href={{ asset('/wp-content/themes/woodmart/css/parts/base8833.css') }} media='all' />
    <style id="wd-style-base-inline-css">
        @font-face {
            font-weight: normal;
            font-style: normal;
            font-family: "woodmart-font";
            src: url({{ asset('/wp-content/themes/woodmart/fonts/woodmart-font-1-400c9dd.woff2?v=8.5.2') }}) format("woff2");
        }
    </style>
    <link rel='stylesheet' id='wd-header-base-css'
        href={{ asset('/wp-content/themes/woodmart/css/parts/header-base8833.css') }} media='all' />
    <link rel='stylesheet' id='wd-header-el-search-css'
        href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-search8833.css') }} media='all' />
    <link rel='stylesheet' id='wd-header-my-account-dropdown-css'
        href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-my-account-dropdown8833.css') }} media='all' />




    <link rel="stylesheet" id="wd-categories-loop-mask-subcat-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-categories-loop-mask-subcat8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-woo-categories-loop-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-categories-loop8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-product-loop-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-product-loop8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-woo-loop-prod-el-base-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-loop-prod-el-base8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-woo-loop-prod-predefined-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-loop-prod-predefined8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-product-loop-standard-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-product-loop-standard8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-woo-mod-loop-prod-add-btn-replace-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-mod-loop-prod-add-btn-replace8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-woo-opt-products-bg-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-opt-products-bg8833.css') }} type="text/css"
        media="all" />


    <link rel="stylesheet" id="wd-widget-collapse-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/opt-widget-collapse8833.css') }} type="text/css"
        media="all" />

    <link rel="stylesheet" id="wd-woo-el-notices-builder-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-el-notices-builder8833.css') }} type="text/css"
        media="all" />

    <link rel="stylesheet" id="wd-woo-shop-el-order-by-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-shop-el-order-by8833.css') }} type="text/css"
        media="all" />

    <link rel="stylesheet" id="wd-woo-shop-el-products-view-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-shop-el-products-view8833.css') }} type="text/css"
        media="all" />

    <link rel="stylesheet" id="wd-woo-shop-el-products-per-page-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-shop-el-products-per-page8833.css') }} type="text/css"
        media="all" />


    <link rel="stylesheet" id="wd-el-off-canvas-column-btn-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/el-off-canvas-column-btn8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-off-canvas-sidebar-critical-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/opt-off-canvas-sidebar-critical8833.css') }} type="text/css"
        media="all" />

    <link rel="stylesheet" id="wd-widget-general-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/widget-general8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-widget-product-cat-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-widget-product-cat8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-widget-price-filter-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-widget-price-filter8833.css') }} type="text/css"
        media="all" />


    <link rel="stylesheet" id="wd-int-elem-opt-off-canvas-column-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/int-elem-opt-off-canvas-column8833.css') }} type="text/css"
        media="all" />
    <link rel="stylesheet" id="wd-int-elem-opt-sticky-column-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/int-elem-opt-sticky-column8833.css') }} type="text/css"
        media="all" />


    <link rel="stylesheet" id="wd-mod-breadcrumbs-no-wrap-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/mod-breadcrumbs-no-wrap8833.css') }} type="text/css"
        media="all" />

    <link rel="stylesheet" id="elementor-post-1048-css"
        href={{ asset('/wp-content/uploads/elementor/css/post-104861a0.css') }} type="text/css" media="all">
    <link rel='stylesheet' id='base-desktop-css'
        href={{ asset('/wp-content/uploads/elementor/css/base-desktopa49e.css') }} media='all' />
    <link rel='stylesheet' id='base-mobile-css'
        href={{ asset('/wp-content/uploads/elementor/css/base-mobilea49e.css') }} media='(max-width:768px)' />



  <link rel="stylesheet" id="wd-page-title-css"
            href={{ asset('/wp-content/themes/woodmart/css/parts/page-title8833.css') }} type="text/css" media="all" />

 <link rel="stylesheet" id="wd-widget-collapse-css"
                href={{ asset('/wp-content/themes/woodmart/css/parts/opt-widget-collapse8833.css') }} type="text/css"
                media="all" />

    <script id="jquery-core-js" src="wp-includes/js/jquery/jquery.minf43b.js"></script>
    <script id="jquery-migrate-js" src="wp-includes/js/jquery/jquery-migrate.min5589.js"></script>
    <script id="woodmart-settings-js">
        var woodmart_settings = {
            elementor_no_gap: "no",
            zoom_enable: "yes",
            product_images_captions: "no",
            photoswipe_close_on_scroll: "yes",
            download_image: "Descargar imagen",
            pin_it: "Pinear",
            share_fb: "Compartir en Facebook",
            tweet: "Twittear",
            mobile_navigation_drilldown_back_to_categories: "Volver a categorías",
            mobile_navigation_drilldown_back_to_main_menu: "Volver al menú principal",
            mobile_navigation_drilldown_back_to: "Volver a %s",
            photoswipe_template: `<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Cerrar (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Compartir"></button>
                <button class="pswp__button pswp__button--fs" title="Pantalla completa"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Anterior"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Siguiente"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>`,
        };
    </script>


    <script data-wp-strategy="defer" defer src={{ asset('/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min345d.js') }}>
    </script>

    <link rel='stylesheet' href={{ asset('/wp-content/uploads/2026/07/xts-theme_settings_default-17835068198833.css') }}
        media='all' />
    <link rel='stylesheet' href='{{ asset('assets/css/style.css') }}?v={{ filemtime(public_path('assets/css/style.css')) }}' media='all' />

    @stack('styles')

    

</head>



<body
    class="wp-singular page-template-default wp-theme-woodmart
 theme-woodmart woocommerce-no-js wd wrapper-custom categories-accordion-on woodmart-ajax-shop-on
 sticky-toolbar-on elementor-default elementor-kit-6 elementor-page @yield('body_class', 'page page-id-120 elementor-page-120')">


    <div class="wd-page-wrapper website-wrapper">
        <!-- //header -->

        @include('partials.header')

        <div class="wd-page-content main-page-wrapper">
            @yield('content')
        </div>

        <!-- //footer -->
        @include('partials.footer')


    </div>

    <script>
        window.mmDeliveryLabels = {
            shipping: @json(__('✅ Envío gratuito a toda España')),
            estimate: @json(__('📦 Entrega estimada: entre el')),
            and: @json(__('y el')),
        };
        window.mmCartLabels = {
            price: @json(__('Precio')),
            quantity: @json(__('Cantidad')),
            subtotal: @json(__('Subtotal')),
        };
    </script>
    <script src="{{ asset('assets/js/shop.js') }}?v={{ filemtime(public_path('assets/js/shop.js')) }}"></script>
    @stack('scripts')

</body>


</html>
