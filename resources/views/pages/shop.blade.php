@extends('layouts.app')

@section('title', ($pageTitle ?? 'Tienda').' | '.config('app.name'))
@section('body_class', 'home page page-id-120 elementor-page elementor-page-120')

@section('content')


    <main id="main-content" class="wd-content-layout content-layout-wrapper container wd-builder-on" role="main">
        <div class="wd-content-area site-content entry-content">
          
            <div data-elementor-type="wp-post" data-elementor-id="1048" class="elementor elementor-1048">
                <div class="wd-negative-gap elementor-element elementor-element-2fe13d4 wd-section-stretch color-scheme-light e-flex e-con-boxed e-con e-parent"
                    data-id="2fe13d4" data-element_type="container" data-e-type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-6d97786 wd-el-page-heading text-left elementor-widget elementor-widget-wd_page_heading"
                            data-id="6d97786" data-element_type="widget" data-e-type="widget"
                            data-widget_type="wd_page_heading.default">
                            <div class="elementor-widget-container">
                                <h2 class="entry-title title">{{ $pageTitle }}</h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-17b463b wd-nowrap-md wd-el-breadcrumbs text-left elementor-widget elementor-widget-wd_wc_breadcrumb"
                            data-id="17b463b" data-element_type="widget" data-e-type="widget"
                            data-widget_type="wd_wc_breadcrumb.default">
                            <div class="elementor-widget-container">
                             
                                <nav class="wd-breadcrumbs woocommerce-breadcrumb" aria-label="{{ __('Breadcrumb') }}"> <a
                                        href="{{ route('home') }}" class="wd-last-link">
                                        {{ __('Inicio') }} </a>
                                    <span class="wd-delimiter">•</span> <span class="wd-last">
                                        {{ $pageTitle }} </span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wd-negative-gap elementor-element elementor-element-b4d5c7b e-flex e-con-boxed e-con e-parent"
                    data-id="b4d5c7b" data-element_type="container" data-e-type="container">
                    <div class="e-con-inner">
                    </div>
                </div>
                <div class="wd-negative-gap elementor-element elementor-element-fe5b2cf e-flex e-con-boxed e-con e-parent"
                    data-id="fe5b2cf" data-element_type="container" data-e-type="container">
                    <div class="e-con-inner">
                     
                        <div class="wd-sticky-container-lg elementor-element elementor-element-2cdcb37 e-con-full wd-col-offcanvas-md-sm wd-col-offcanvas-sm e-flex wd-alignment-left e-con e-child"
                            data-id="2cdcb37" data-element_type="container" data-e-type="container"
                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="mm-sidebar-close-bar">
                                <button type="button" class="close-side-widget mm-sidebar-close-btn" aria-label="{{ __('Cerrar') }}">
                                    <span>{{ __('Cerrar') }}</span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="5" x2="19" y2="19"/><line x1="19" y1="5" x2="5" y2="19"/></svg>
                                </button>
                            </div>
                            <div class="elementor-element elementor-element-4bd70f5 elementor-widget elementor-widget-sidebar"
                                data-id="4bd70f5" data-element_type="widget" data-e-type="widget"
                                data-widget_type="sidebar.default">
                              
                                <div id="woocommerce_product_categories-3"
                                    class="wd-widget widget sidebar-widget woocommerce widget_product_categories">
                                    <h5 class="widget-title">{{ __('Categorías de productos') }}</h5>
                                    <ul class="product-categories">
                                        @foreach ($categories as $cat)
                                            <li class="cat-item {{ $category && $category->id === $cat->id ? 'current-cat wd-active' : '' }}">
                                                <a href="{{ route('category', $cat->translatedValue('slug')).(($preservedFilterQuery ?? '') !== '' ? '?'.$preservedFilterQuery : '') }}">{{ $cat->translatedValue('name') }}</a>
                                                <span class="count">{{ $cat->products_count }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="woodmart-price-filter-3"
                                    class="wd-widget widget sidebar-widget woodmart-price-filter">
                                    <h5 class="widget-title">{{ __('Filtro de precio') }}</h5>
                                    <div class="woodmart-price-filter">
                                        <ul>
                                            <li>
                                                <a rel="nofollow noopener" href="{{ $allPricesUrl }}" class="{{ $allPricesActive ? 'current-state' : '' }}">{{ __('Todo') }}</a>
                                            </li>
                                            @foreach ($priceFilters as $filter)
                                                <li>
                                                    <a rel="nofollow noopener" href="{{ $filter['url'] }}" class="{{ $filter['active'] ? 'current-state' : '' }}">{{ $filter['label'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-074f96b wd-col-content-md-sm wd-col-content-sm e-con-full e-flex e-con e-child"
                            data-id="074f96b" data-element_type="container" data-e-type="container">
                            <div class="elementor-element elementor-element-f9ac666 e-con-full e-flex e-con e-child"
                                data-id="f9ac666" data-element_type="container" data-e-type="container">
                                <div class="elementor-element elementor-element-c5f2bd8 e-con-full e-flex e-con e-child"
                                    data-id="c5f2bd8" data-element_type="container" data-e-type="container">
                                    <div class="elementor-element elementor-element-6e69c03 elementor-hidden-tablet elementor-hidden-mobile wd-shop-result-count elementor-widget elementor-widget-wd_shop_archive_result_count"
                                        data-id="6e69c03" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_shop_archive_result_count.default">
                                        <div class="elementor-widget-container">
                                            <p class="woocommerce-result-count" role="status" aria-relevant="all">
                                                Mostrando {{ $products->firstItem() ?? 0 }}&ndash;{{ $products->lastItem() ?? 0 }} de {{ $products->total() }} resultados</p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-17b6737 elementor-hidden-desktop elementor-widget elementor-widget-wd_builder_off_canvas_column_btn"
                                        data-id="17b6737" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_builder_off_canvas_column_btn.default">
                                        <div class="elementor-widget-container">
                                          
                                            <div class="wd-off-canvas-btn wd-action-btn wd-style-text wd-burger-icon">
                                                <a href="#" rel="nofollow">
                                                    <span class="wd-action-icon">
                                                    </span>
                                                    <span class="wd-action-text">
                                                        {{ __('Show sidebar') }} </span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-47074c1 elementor-hidden-tablet elementor-hidden-mobile wd-shop-prod-per-page elementor-widget elementor-widget-wd_shop_archive_per_page"
                                        data-id="47074c1" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_shop_archive_per_page.default">
                                        <div class="elementor-widget-container">
                                            
                                            <div class="wd-products-per-page">
                                                <span class="wd-label per-page-title">
                                                    {{ __('Mostrar') }} </span>

                                                <a rel="nofollow noopener" href="#"
                                                    class="per-page-variation">
                                                    <span>
                                                        9 </span>
                                                </a>
                                                <span class="per-page-border"></span>
                                                <a rel="nofollow noopener" href="#"
                                                    class="per-page-variation">
                                                    <span>
                                                        12 </span>
                                                </a>
                                                <span class="per-page-border"></span>
                                                <a rel="nofollow noopener" href="#"
                                                    class="per-page-variation">
                                                    <span>
                                                        18 </span>
                                                </a>
                                                <span class="per-page-border"></span>
                                                <a rel="nofollow noopener" href="#"
                                                    class="per-page-variation current-variation">
                                                    <span>
                                                        24 </span>
                                                </a>
                                                <span class="per-page-border"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-8bd808a elementor-hidden-tablet elementor-hidden-mobile wd-shop-view elementor-widget elementor-widget-wd_shop_archive_view"
                                        data-id="8bd808a" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_shop_archive_view.default">
                                        <div class="elementor-widget-container">
                                            
                                            <div class="wd-products-shop-view products-view-grid">


                                                <a rel="nofollow noopener"
                                                    href="#"
                                                    class="shop-view per-row-3" aria-label="{{ __('Vista de cuadrícula 3') }}"></a>

                                                <a rel="nofollow noopener"
                                                    href="#"
                                                    class="shop-view per-row-4" aria-label="{{ __('Vista de cuadrícula 4') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-63d75c4 wd-shop-ordering elementor-widget elementor-widget-wd_shop_archive_orderby"
                                        data-id="63d75c4" data-element_type="widget" data-e-type="widget"
                                        data-widget_type="wd_shop_archive_orderby.default">
                                        <div class="elementor-widget-container">
                                            
                                            <form class="woocommerce-ordering wd-style-underline wd-ordering-mb-icon"
                                                method="get">
                                                <select name="orderby" class="orderby" aria-label="{{ __('Pedido de la tienda') }}">
                                                    <option value="menu_order" {{ request('orderby') === null || request('orderby') === 'menu_order' ? 'selected' : '' }}>{{ __('Orden predeterminado') }}</option>
                                                    <option value="popularity" {{ request('orderby') === 'popularity' ? 'selected' : '' }}>{{ __('Ordenar por popularidad') }}</option>
                                                    <option value="date" {{ request('orderby') === 'date' ? 'selected' : '' }}>{{ __('Ordenar por los últimos') }}</option>
                                                    <option value="price" {{ request('orderby') === 'price' ? 'selected' : '' }}>{{ __('Ordenar por precio: bajo a alto') }}
                                                    </option>
                                                    <option value="price-desc" {{ request('orderby') === 'price-desc' ? 'selected' : '' }}>{{ __('Ordenar por precio: alto a bajo') }}
                                                    </option>
                                                </select>
                                                {{-- Preserve the other active filters: a plain GET submit would
                                                     otherwise drop them, since they're not fields in this form. --}}
                                                @if (request()->filled('min_price'))
                                                    <input type="hidden" name="min_price" value="{{ request('min_price') }}" />
                                                @endif
                                                @if (request()->filled('max_price'))
                                                    <input type="hidden" name="max_price" value="{{ request('max_price') }}" />
                                                @endif
                                                @if (request()->filled('per_page'))
                                                    <input type="hidden" name="per_page" value="{{ request('per_page') }}" />
                                                @endif
                                                @if ($searchTerm)
                                                    <input type="hidden" name="q" value="{{ $searchTerm }}" />
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-2ecd032 wd-wc-notices elementor-widget elementor-widget-wd_wc_notices"
                                data-id="2ecd032" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_wc_notices.default">
                                <div class="elementor-widget-container">
                                   
                                    <div class="woocommerce-notices-wrapper"></div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-b4b0847 elementor-widget elementor-widget-shortcode"
                                data-id="b4b0847" data-element_type="widget" data-e-type="widget"
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
                            <div class="elementor-element elementor-element-0024986 wd-shop-product wd-products-element elementor-widget elementor-widget-wd_archive_products"
                                data-id="0024986" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_archive_products.default">
                                <div class="elementor-widget-container">
                                    <div class="wd-sticky-loader wd-deferred wd-content-loader"><span
                                            class="wd-loader"></span></div>

                                
                                    <div class="products wd-products grid-masonry wd-grid-f-col grid-columns-4 elements-grid pagination-pagination wd-loop-builder-off wd-products-with-bg"
                                        data-source="main_loop" data-min_price="" data-max_price="" data-columns="4"
                                        style="--wd-col-lg:4;--wd-col-md:4;--wd-col-sm:2;--wd-gap-lg:30px;--wd-gap-sm:10px;">
                                        @forelse ($products as $product)
                                            @include('partials.product-card', ['product' => $product])
                                        @empty
                                            <p>{{ __('No se han encontrado productos.') }}</p>
                                        @endforelse
                                    </div>

                                    @include('partials.pagination', ['paginator' => $products])

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </main>





@endsection
