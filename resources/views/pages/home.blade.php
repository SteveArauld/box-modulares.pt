@extends('layouts.app')

@section('title', config('app.name').' | Materiales de Construcción, Jardín, Pérgolas, Piscinas y Equipamiento')
@section('body_class', 'home page page-id-120 elementor-page elementor-page-120')


<style>

</style>

@section('content')
    <main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">


        <div class="wd-content-area site-content">
            <article id="post-120" class="entry-content post-120 page type-page status-publish hentry">
                <div data-elementor-type="wp-page" data-elementor-id="120" class="elementor elementor-120">
                    <div class="elementor-element elementor-element-2cfdb96 e-con-full e-flex e-con e-parent"
                        data-id="2cfdb96" data-element_type="container" data-e-type="container"
                        data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
                        <div class="elementor-element elementor-element-9cbc35c e-con-full e-flex e-con e-child"
                            data-id="9cbc35c" data-element_type="container" data-e-type="container">
                            <div class="elementor-element elementor-element-0e8566d elementor-widget elementor-widget-html"
                                data-id="0e8566d" data-element_type="widget" data-e-type="widget"
                                data-widget_type="html.default">
                                <div class="mm-hero-left">

                                    <div class="mm-avatars-row">
                                        <div class="mm-avatars">
                                            <span class="mm-avatar">{{ __('A') }}</span>
                                            <span class="mm-avatar">{{ __('L') }}</span>
                                            <span class="mm-avatar">{{ __('J') }}</span>
                                        </div>
                                        <p class="mm-avatars-text">{{ __('+X clientes satisfechos') }}</p>
                                    </div>

                                    <h1 class="mm-hero-title">
                                        {{ __('Calidad, innovación') }} <span class="mm-accent">{{ __('y confianza') }}</span> {{ __('para tu jardín') }}
                                    </h1>

                                    <p class="mm-hero-stat">
                                        {{ __('Desde') }} <strong>149 €</strong> {{ __('· Envío en') }} <strong>{{ __('48-72h') }}</strong> {{ __('a toda España') }}
                                    </p>

                                    <div class="mm-badges-row">
                                        <div class="mm-badge"><span class="mm-dot"></span>{{ __('Stock propio') }}</div>
                                        <div class="mm-badge"><span class="mm-dot"></span>{{ __('Garantía 3 años') }}</div>
                                        <div class="mm-badge"><span class="mm-dot"></span>{{ __('Pago seguro') }}</div>
                                        <div class="mm-badge"><span class="mm-dot"></span>{{ __('Financiación') }}</div>
                                    </div>

                                    <div class="mm-cta-row">
                                        <a href="https://wa.me/34603547522" class="mm-btn mm-btn-primary">{{ __('Contactar por WhatsApp') }}</a>
                                        <a href="tienda" class="mm-btn mm-btn-secondary">{{ __('Ver catálogo') }}</a>
                                    </div>

                                    <div class="mm-trust-row">
                                        <span>{{ __('✔ Envío a toda España') }}</span>
                                        <span>{{ __('✔ Soporte técnico propio') }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-9c39916 e-con-full e-flex e-con e-child"
                            data-id="9c39916" data-element_type="container" data-e-type="container">
                            <div class="elementor-element elementor-element-f87accd elementor-widget elementor-widget-image"
                                data-id="f87accd" data-element_type="widget" data-e-type="widget"
                                data-widget_type="image.default">
                                <img fetchpriority="high" decoding="async" width="1024" height="683"
                                    src="/wp-content/uploads/2026/07/01-fullsizerender-1024x1024-5b51ed90-024e-4ee8-af91-4c8759da177.jpeg"
                                    class="attachment-large size-large wp-image-5916" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="wd-negative-gap elementor-element elementor-element-4fad0d6 e-flex e-con-boxed e-con e-parent"
                        data-id="4fad0d6" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-92974b6 elementor-widget elementor-widget-shortcode"
                                data-id="92974b6" data-element_type="widget" data-e-type="widget"
                                data-widget_type="shortcode.default">
                                <div class="elementor-shortcode">
                                    <div class="mm-trust-badges">
                                        <div class="mm-trust-badge">
                                            <span class="mm-trust-badge-icon">
                                                <svg viewBox="0 0 24 24" width="32" height="32" fill="none"
                                                    stroke="currentColor" stroke-width="1.5">
                                                    <path d="M12 2l8 3v6c0 5-3.5 9-8 11-4.5-2-8-6-8-11V5l8-3z" />
                                                </svg>
                                            </span>
                                            <div class="mm-trust-badge-text">
                                                <strong>{{ __('Garantía 3 años') }}</strong>
                                                <span>{{ __('En todos nuestros productos') }}</span>
                                            </div>
                                        </div>
                                        <div class="mm-trust-badge">
                                            <span class="mm-trust-badge-icon">
                                                <svg viewBox="0 0 24 24" width="32" height="32" fill="none"
                                                    stroke="currentColor" stroke-width="1.5">
                                                    <path
                                                        d="M3 16V6a1 1 0 011-1h9v11M3 16h10M3 16v0a2 2 0 104 0M13 16a2 2 0 104 0m-4 0h4m0 0h3v-5l-3-4h-3v9z" />
                                                </svg>
                                            </span>
                                            <div class="mm-trust-badge-text">
                                                <strong>{{ __('Envío a toda España') }}</strong>
                                                <span>{{ __('Rápido y con seguimiento') }}</span>
                                            </div>
                                        </div>
                                        <div class="mm-trust-badge">
                                            <span class="mm-trust-badge-icon">
                                                <svg viewBox="0 0 24 24" width="32" height="32" fill="none"
                                                    stroke="currentColor" stroke-width="1.5">
                                                    <path
                                                        d="M4 13a8 8 0 0116 0M4 13v4a2 2 0 002 2h1v-6H5a1 1 0 00-1 1zm16 0v4a2 2 0 01-2 2h-1v-6h1a1 1 0 011 1z" />
                                                </svg>
                                            </span>
                                            <div class="mm-trust-badge-text">
                                                <strong>{{ __('Soporte técnico propio') }}</strong>
                                                <span>{{ __('Asistencia técnica dedicada') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wd-negative-gap elementor-element elementor-element-1b15809 e-flex e-con-boxed e-con e-parent"
                        data-id="1b15809" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-37fe74c elementor-widget elementor-widget-html"
                                data-id="37fe74c" data-element_type="widget" data-e-type="widget"
                                data-widget_type="html.default">
                                <h2 class="mm-section-title">{{ __('Nuestras categorías') }}</h2>
                            </div>
                            <div class="elementor-element elementor-element-5a82be3 wd-width-100 elementor-widget elementor-widget-wd_product_categories"
                                data-id="5a82be3" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_product_categories.default">
                                <div class="elementor-widget-container">
                                    <link rel="stylesheet" id="wd-woo-opt-products-bg-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-opt-products-bg8833.css') }}
                                        type="text/css" media="all" />
                                    <link rel="stylesheet" id="wd-categories-loop-mask-subcat-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-categories-loop-mask-subcat8833.css') }}
                                        type="text/css" media="all" />
                                    <link rel="stylesheet" id="wd-woo-categories-loop-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-categories-loop8833.css') }}
                                        type="text/css" media="all" />
                                    <link rel="stylesheet" id="wd-swiper-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/lib-swiper8833.css') }}
                                        type="text/css" media="all" />
                                        <style>
                                            
                                        </style>
                                    <div class="wd-cats products columns-6 wd-products-with-bg wd-cats-element wd-carousel-container"
                                        id="carousel-6ac47ee6db0b1">
                                        <div class="wd-carousel-inner">
                                            <div class="wd-carousel wd-grid scroll-init" data-scroll_per_page="yes"
                                                style="--wd-col-lg:6;--wd-col-md:4;--wd-col-sm:2;--wd-gap-lg:20px;--wd-gap-sm:10px;">
                                                <div class="wd-carousel-wrap">
                                                @foreach ($heroCategories as $index => $entry)
                                                    @php
                                                        $cat = $entry['category'];
                                                        $catSlug = route('category', $cat->translatedValue('slug'));
                                                        $catName = $cat->translatedValue('name');
                                                    @endphp
                                                    <div class="wd-carousel-item">
                                                        <div class="wd-cat cat-design-mask-subcat without-product-count wd-with-subcat product-category product {{ $index === 0 ? 'first' : '' }} {{ $index === $heroCategories->count() - 1 ? 'last' : '' }}"
                                                            data-loop="{{ $index + 1 }}">
                                                            <div class="wd-cat-wrap" style="height: 180px;">
                                                                <div class="wd-cat-inner">
                                                                    <div class="wd-cat-thumb">
                                                                        <div class="wd-cat-image">
                                                                            <img decoding="async" width="150" height="150"
                                                                                src="{{ asset($entry['icon']) }}"
                                                                                class="attachment-thumbnail size-thumbnail"
                                                                                alt="{{ $catName }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="wd-cat-content wd-scroll wd-fill">
                                                                        <a class="wd-fill" href="{{ $catSlug }}"></a>
                                                                        <div class="wd-cat-header">
                                                                            <h3 class="wd-entities-title">
                                                                                <a href="{{ $catSlug }}">{{ $catName }} </a>
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wd-negative-gap elementor-element elementor-element-927d859 e-flex e-con-boxed e-con e-parent"
                        data-id="927d859" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-801bd4b elementor-widget elementor-widget-html"
                                data-id="801bd4b" data-element_type="widget" data-e-type="widget"
                                data-widget_type="html.default">
                                <h2 class="mm-section-title">{{ __('Nuestros productos destacados') }}</h2>
                            </div>
                            <div class="elementor-element elementor-element-8e31d6f wd-width-100 elementor-widget elementor-widget-wd_products"
                                data-id="8e31d6f" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_products.default">
                                <div class="elementor-widget-container">
                                    <link rel="stylesheet" id="wd-product-loop-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-product-loop8833.css') }}
                                        type="text/css" media="all" />
                                    <link rel="stylesheet" id="wd-woo-loop-prod-el-base-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-loop-prod-el-base8833.css') }}
                                        type="text/css" media="all" />
                                    <link rel="stylesheet" id="wd-woo-loop-prod-predefined-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-loop-prod-predefined8833.css') }}
                                        type="text/css" media="all" />
                                    <link rel="stylesheet" id="wd-product-loop-standard-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-product-loop-standard8833.css') }}
                                        type="text/css" media="all" />
                                    <link rel="stylesheet" id="wd-woo-mod-loop-prod-add-btn-replace-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-mod-loop-prod-add-btn-replace8833.css') }}
                                        type="text/css" media="all" />
                                    <link rel="stylesheet" id="wd-woo-opt-stretch-cont-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-opt-stretch-cont8833.css') }}
                                        type="text/css" media="all" />
                                    <link rel="stylesheet" id="wd-woo-opt-stretch-cont-predefined-css"
                                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-opt-stretch-cont-predefined8833.css') }}
                                        type="text/css" media="all" />
                                    <div class="wd-products-element">




                                        <div class="products wd-products pagination-links grid-columns-6 elements-grid grid-masonry wd-grid-f-col wd-loop-builder-off wd-stretch-cont-lg wd-products-with-bg"
                                            data-paged="1"
                                            data-atts="{&quot;speed&quot;:null,&quot;slides_per_view&quot;:null,&quot;wrap&quot;:null,&quot;autoplay&quot;:null,&quot;autoheight&quot;:null,&quot;hide_pagination_control&quot;:null,&quot;dynamic_pagination_control&quot;:null,&quot;hide_prev_next_buttons&quot;:null,&quot;carousel_arrows_position&quot;:null,&quot;hide_scrollbar&quot;:null,&quot;scroll_per_page&quot;:null,&quot;center_mode&quot;:null,&quot;carousel_sync&quot;:null,&quot;sync_parent_id&quot;:null,&quot;sync_child_id&quot;:null,&quot;sync_group_id&quot;:null,&quot;scroll_carousel_init&quot;:null,&quot;disable_overflow_carousel&quot;:null,&quot;include&quot;:null,&quot;orderby&quot;:&quot;rand&quot;,&quot;meta_key&quot;:null,&quot;ajax_recently_viewed&quot;:null,&quot;pagination&quot;:&quot;links&quot;,&quot;pagination_arrows_position&quot;:null,&quot;items_per_page&quot;:24,&quot;list_spacing&quot;:null,&quot;columns&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:6,&quot;sizes&quot;:[]},&quot;products_masonry&quot;:&quot;&quot;,&quot;products_different_sizes&quot;:&quot;&quot;,&quot;product_quantity&quot;:&quot;&quot;,&quot;product_hover&quot;:&quot;standard&quot;,&quot;product_custom_hover&quot;:null,&quot;sale_countdown&quot;:&quot;1&quot;,&quot;stretch_product&quot;:&quot;1&quot;,&quot;stock_progress_bar&quot;:&quot;0&quot;,&quot;highlighted_products&quot;:&quot;0&quot;,&quot;products_divider&quot;:null,&quot;products_bordered_grid&quot;:&quot;&quot;,&quot;products_bordered_grid_style&quot;:null,&quot;products_with_background&quot;:&quot;1&quot;,&quot;products_shadow&quot;:&quot;0&quot;,&quot;img_size&quot;:&quot;large&quot;,&quot;img_size_custom&quot;:null,&quot;grid_gallery_control&quot;:null,&quot;grid_gallery_enable_arrows&quot;:null,&quot;elementor&quot;:true,&quot;force_not_ajax&quot;:&quot;no&quot;}"
                                            data-source="shortcode" data-columns="6"
                                            style="--wd-col-lg:6;--wd-col-md:4;--wd-col-sm:2;--wd-gap-lg:20px;--wd-gap-sm:10px;">

                                            @foreach ($featuredProducts as $product)
                                                @include('partials.product-card', ['product' => $product])
                                            @endforeach

                                        </div>

                                        @include('partials.pagination', ['paginator' => $featuredProducts])

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wd-negative-gap elementor-element elementor-element-18e354a e-flex e-con-boxed e-con e-parent"
                        data-id="18e354a" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-a7e9059 elementor-widget elementor-widget-html"
                                data-id="a7e9059" data-element_type="widget" data-e-type="widget"
                                data-widget_type="html.default">
                                <div class="mm-why-section">
                                    <h2 class="mm-section-title">{{ __('¿Por qué elegirnos?') }}</h2>

                                    <div class="mm-why-grid">

                                        <div class="mm-why-card">
                                            <div class="mm-why-icon">
                                                <svg viewBox="0 0 24 24" width="28" height="28"
                                                    fill="none" stroke="currentColor" stroke-width="1.5">
                                                    <rect x="3" y="3" width="7" height="7" rx="1" />
                                                    <rect x="14" y="3" width="7" height="7" rx="1" />
                                                    <rect x="3" y="14" width="7" height="7" rx="1" />
                                                    <rect x="14" y="14" width="7" height="7"
                                                        rx="1" />
                                                </svg>
                                            </div>
                                            <h3>{{ __('Amplio catálogo de productos') }}</h3>
                                            <p>{{ __('Más de una decena de categorías para la construcción, el jardín, las piscinas, las pérgolas, la calefacción, el taller y el equipamiento profesional.') }}</p>
                                        </div>

                                        <div class="mm-why-card">
                                            <div class="mm-why-icon">
                                                <svg viewBox="0 0 24 24" width="28" height="28"
                                                    fill="none" stroke="currentColor" stroke-width="1.5">
                                                    <path
                                                        d="M3 16V6a1 1 0 011-1h9v11M3 16h10M3 16v0a2 2 0 104 0M13 16a2 2 0 104 0m-4 0h4m0 0h3v-5l-3-4h-3v9z" />
                                                </svg>
                                            </div>
                                            <h3>{{ __('Envío gratuito') }}</h3>
                                            <p>{{ __('Todos los pedidos realizados en la tienda disfrutan de envío gratuito.') }}</p>
                                        </div>

                                        <div class="mm-why-card">
                                            <div class="mm-why-icon">
                                                <svg viewBox="0 0 24 24" width="28" height="28"
                                                    fill="none" stroke="currentColor" stroke-width="1.5">
                                                    <circle cx="9" cy="8" r="3" />
                                                    <path d="M2 20c0-3.3 3-6 7-6s7 2.7 7 6" />
                                                    <path d="M16 5.5a3 3 0 010 5.8M22 20c0-2.6-2.2-4.8-5-5.5" />
                                                </svg>
                                            </div>
                                            <h3>{{ __('Productos para particulares y profesionales') }}</h3>
                                            <p>{{ __('Soluciones adaptadas tanto a proyectos de bricolaje y mejora del hogar como a necesidades profesionales.') }}</p>
                                        </div>

                                        <div class="mm-why-card">
                                            <div class="mm-why-icon">
                                                <svg viewBox="0 0 24 24" width="28" height="28"
                                                    fill="none" stroke="currentColor" stroke-width="1.5">
                                                    <circle cx="12" cy="8" r="5" />
                                                    <path d="M8.5 13.5L7 21l5-3 5 3-1.5-7.5" />
                                                </svg>
                                            </div>
                                            <h3>{{ __('Calidad y selección de productos') }}</h3>
                                            <p>{{ __('Selección de materiales y equipos diseñados para ofrecer durabilidad, funcionalidad y una excelente relación calidad-precio.') }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wd-negative-gap elementor-element elementor-element-fde0a4d e-flex e-con-boxed e-con e-parent"
                        data-id="fde0a4d" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-80d96f6 elementor-widget elementor-widget-html"
                                data-id="80d96f6" data-element_type="widget" data-e-type="widget"
                                data-widget_type="html.default">
                                <div class="mm-reviews-section">
                                    <h2 class="mm-section-title">{{ __('Opiniones de nuestros clientes') }}</h2>
                                    <p class="mm-reviews-summary">⭐ <strong>4,6/5</strong> {{ __('· basado en 20 opiniones verificadas') }}</p>

                                    <div class="mm-reviews-scroll">

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"La pérgola llegó en perfectas condiciones y la calidad es excelente. La instalación fue más sencilla de lo que esperaba. Muy satisfecho con la compra."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Antonio M.') }}</strong> {{ __('– Valencia') }}
                                                <span class="mm-review-product">{{ __('Pérgola de aluminio') }}</span>
                                                <span class="mm-review-date">{{ __('Hace 2 semanas') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"La caseta tiene muy buenos acabados y ofrece mucho espacio de almacenamiento. El envío fue rápido y todo llegó perfectamente embalado."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Laura G.') }}</strong> {{ __('– Madrid') }}
                                                <span class="mm-review-product">{{ __('Caseta de jardín de madera') }}</span>
                                                <span class="mm-review-date">{{ __('Junio 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Muy buena relación calidad-precio. La barbacoa es robusta y fácil de montar. Sin duda volveré a comprar."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('José R.') }}</strong> {{ __('– Sevilla') }}
                                                <span class="mm-review-product">{{ __('Barbacoa de carbón') }}</span>
                                                <span class="mm-review-date">{{ __('Hace 1 mes') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"La piscina superó nuestras expectativas. Perfecta para el verano y muy fácil de instalar. Los niños están encantados."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Marta P.') }}</strong> {{ __('– Zaragoza') }}
                                                <span class="mm-review-product">{{ __('Piscina desmontable') }}</span>
                                                <span class="mm-review-date">{{ __('Mayo 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Producto de gran calidad y funcionamiento impecable. La descripción de la web era totalmente correcta. Muy recomendable."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Carlos F.') }}</strong> {{ __('– Bilbao') }}
                                                <span class="mm-review-product">{{ __('Generador eléctrico') }}</span>
                                                <span class="mm-review-date">{{ __('Hace 3 semanas') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Los muebles son cómodos, resistentes y muy elegantes. Han quedado perfectos en la terraza. Excelente compra."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Elena S.') }}</strong> {{ __('– Málaga') }}
                                                <span class="mm-review-product">{{ __('Muebles de jardín') }}</span>
                                                <span class="mm-review-date">{{ __('Junio 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Pellet de muy buena calidad y con excelente rendimiento. El proceso de compra fue sencillo y la entrega sin incidencias."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('David C.') }}</strong> {{ __('– Alicante') }}
                                                <span class="mm-review-product">{{ __('Pellet para calefacción') }}</span>
                                                <span class="mm-review-date">{{ __('Hace 1 semana') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"El cenador es muy resistente y tiene un diseño moderno. Llegó bien protegido y el montaje fue bastante fácil."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Sonia L.') }}</strong> {{ __('– Murcia') }}
                                                <span class="mm-review-product">{{ __('Cenador para jardín') }}</span>
                                                <span class="mm-review-date">{{ __('Abril 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Material de buena calidad y exactamente como aparecía en la web. Muy buena experiencia de compra."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Miguel A.') }}</strong> {{ __('– Valladolid') }}
                                                <span class="mm-review-product">{{ __('Herramienta para trabajo de madera') }}</span>
                                                <span class="mm-review-date">{{ __('Mayo 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:100%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Buscábamos una solución resistente para nuestra terraza y este producto ha cumplido todas nuestras expectativas. Muy buena calidad y envío gratuito, un punto muy positivo."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Cristina T.') }}</strong> {{ __('– Barcelona') }}
                                                <span class="mm-review-product">{{ __('Techo para terraza') }}</span>
                                                <span class="mm-review-date">{{ __('Hace 2 meses') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:90%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"La calidad es muy buena y el resultado final es excelente. Solo habría agradecido recibir las instrucciones un poco más detalladas."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Javier D.') }}</strong> {{ __('– Granada') }}
                                                <span class="mm-review-product">{{ __('Pérgola bioclimática') }}</span>
                                                <span class="mm-review-date">{{ __('Hace 3 semanas') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:90%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"El producto cumple perfectamente con la descripción. Materiales resistentes y un acabado muy bonito. Muy recomendable."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Patricia V.') }}</strong> {{ __('– Santander') }}
                                                <span class="mm-review-product">{{ __('Caseta de jardín') }}</span>
                                                <span class="mm-review-date">{{ __('Junio 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:90%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Funciona perfectamente desde el primer día. La entrega tardó un poco más de lo previsto, pero el producto merece la pena."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Raúl N.') }}</strong> {{ __('– Córdoba') }}
                                                <span class="mm-review-product">{{ __('Generador eléctrico') }}</span>
                                                <span class="mm-review-date">{{ __('Hace 1 mes') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:90%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Estamos muy contentos con la compra. Los muebles son cómodos y de buena calidad. Sin duda volvería a comprar."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Isabel C.') }}</strong> {{ __('– Vigo') }}
                                                <span class="mm-review-product">{{ __('Muebles de jardín') }}</span>
                                                <span class="mm-review-date">{{ __('Mayo 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:90%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"La piscina es exactamente como esperaba. El montaje llevó algo de tiempo, pero el resultado ha sido excelente."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Daniel H.') }}</strong> {{ __('– Salamanca') }}
                                                <span class="mm-review-product">{{ __('Piscina desmontable') }}</span>
                                                <span class="mm-review-date">{{ __('Abril 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:80%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Buena calidad y fácil de montar. El envío fue correcto y el producto cumple con lo prometido."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Ana B.') }}</strong> {{ __('– Oviedo') }}
                                                <span class="mm-review-product">{{ __('Barbacoa de carbón') }}</span>
                                                <span class="mm-review-date">{{ __('Hace 2 meses') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:80%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Buen rendimiento y precio competitivo. Todo el proceso de compra fue sencillo."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Sergio P.') }}</strong> {{ __('– Tarragona') }}
                                                <span class="mm-review-product">{{ __('Pellet') }}</span>
                                                <span class="mm-review-date">{{ __('Junio 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:80%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"El cenador tiene un diseño muy bonito y parece resistente. La entrega fue puntual y el embalaje estaba en buen estado."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Rosa M.') }}</strong> {{ __('– León') }}
                                                <span class="mm-review-product">{{ __('Cenador de jardín') }}</span>
                                                <span class="mm-review-date">{{ __('Mayo 2026') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:80%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Producto de buena calidad y fácil de instalar. En general, una experiencia de compra positiva."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Fernando G.') }}</strong> {{ __('– Pamplona') }}
                                                <span class="mm-review-product">{{ __('Techo para terraza') }}</span>
                                                <span class="mm-review-date">{{ __('Hace 6 semanas') }}</span>
                                            </div>
                                        </div>

                                        <div class="mm-review-card">
                                            <div class="mm-stars" style="--rating:80%"><span
                                                    class="mm-stars-bg">★★★★★</span><span
                                                    class="mm-stars-fg">★★★★★</span></div>
                                            <p class="mm-review-text">{{ __('"Las herramientas cumplen con su función y tienen buenos acabados. Todo llegó correctamente embalado y en buen estado."') }}</p>
                                            <div class="mm-review-meta">
                                                <strong>{{ __('Lucía T.') }}</strong> {{ __('– A Coruña') }}
                                                <span class="mm-review-product">{{ __('Herramientas para madera') }}</span>
                                                <span class="mm-review-date">{{ __('Abril 2026') }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wd-negative-gap elementor-element elementor-element-e93d885 e-flex e-con-boxed e-con e-parent"
                        data-id="e93d885" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-da535f8 elementor-widget elementor-widget-html"
                                data-id="da535f8" data-element_type="widget" data-e-type="widget"
                                data-widget_type="html.default">
                                <div class="mm-faq-section">
                                    <h2 class="mm-section-title">{{ __('Preguntas Frecuentes (FAQ)') }}</h2>

                                    <div class="mm-faq-list">

                                        <details class="mm-faq-item">
                                            <summary>{{ __('¿Cuánto tarda en llegar mi pedido?') }}</summary>
                                            <p>{{ __('El plazo de entrega depende del tipo de producto y del destino del envío. Una vez confirmado el pedido, nuestro equipo lo prepara y expide lo antes posible. Recibirá información de seguimiento cuando esté disponible.') }}</p>
                                        </details>

                                        <details class="mm-faq-item">
                                            <summary>{{ __('¿Los gastos de envío son gratuitos?') }}</summary>
                                            <p>Sí. Todos los pedidos realizados en {{ config('app.name') }} incluyen envío
                                                gratuito, sin costes adicionales de transporte, salvo que se
                                                indique expresamente para servicios especiales.</p>
                                        </details>

                                        <details class="mm-faq-item">
                                            <summary>{{ __('¿Puedo devolver un producto?') }}</summary>
                                            <p>{{ __('Sí. Si es consumidor, dispone de 14 días naturales desde la recepción del pedido para ejercer su derecho de desistimiento, de acuerdo con la legislación vigente. Consulte nuestra Política de Devoluciones y Reembolsos para conocer las condiciones.') }}</p>
                                        </details>

                                        <details class="mm-faq-item">
                                            <summary>{{ __('¿Qué métodos de pago aceptan?') }}</summary>
                                            <p>{{ __('Aceptamos varios métodos de pago seguros, entre ellos tarjetas de crédito y débito, PayPal, Stripe y otros sistemas disponibles durante el proceso de compra. Todas las transacciones se realizan mediante plataformas de pago seguras.') }}</p>
                                        </details>

                                        <details class="mm-faq-item">
                                            <summary>{{ __('¿Ofrecen soporte técnico o instalación?') }}</summary>
                                            <p>{{ __('Sí, contamos con soporte técnico propio para ayudarle antes y después de su compra. Contáctenos si necesita asistencia con la instalación o el uso de su producto.') }}</p>
                                        </details>

                                        <details class="mm-faq-item">
                                            <summary>{{ __('¿Cómo puedo contactar con el servicio de atención al cliente?') }}</summary>
                                            <p>{{ __('Puede ponerse en contacto con nosotros en cualquier momento enviando un correo electrónico a') }} <a
                                                    href="mailto:contacto@gsccontainers.com">contacto@gsccontainers.com</a>{{ __('. Nuestro equipo responderá a su consulta en el menor tiempo posible.') }}</p>
                                        </details>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wd-negative-gap elementor-element elementor-element-c7ced1e e-flex e-con-boxed e-con e-parent"
                        data-id="c7ced1e" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-5572096 elementor-widget elementor-widget-html"
                                data-id="5572096" data-element_type="widget" data-e-type="widget"
                                data-widget_type="html.default">
                                <div class="mm-final-cta">
                                    <h2>{{ __('¿Listo para equipar tu jardín y tu taller?') }}</h2>
                                    <p>{{ __('Envío gratuito · Garantía 3 años · Soporte técnico propio') }}</p>
                                    <div class="mm-final-cta-buttons">
                                        <a href="https://wa.me/34603547522" class="mm-btn mm-btn-primary">{{ __('Contactar por WhatsApp') }}</a>
                                        <a href="mailto:contacto@gsccontainers.com"
                                            class="mm-btn mm-btn-secondary">{{ __('Escríbenos por email') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </article>



        </div>



        <link rel="stylesheet" id="wd-widget-collapse-css"
            href={{ asset('/wp-content/themes/woodmart/css/parts/opt-widget-collapse8833.css') }} type="text/css"
            media="all" />
    </main>
@endsection
