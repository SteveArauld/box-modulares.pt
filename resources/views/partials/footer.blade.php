<footer class="wd-footer footer-container color-scheme-light">
    <link rel="stylesheet" id="wd-footer-base-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/footer-base8833.css') }} type="text/css" media="all" />

    <div class="container main-footer wd-entry-content">
        <link rel="stylesheet" id="elementor-post-78-css"
            href={{ asset('/wp-content/uploads/elementor/css/post-789304.css') }} type="text/css" media="all">
        <link rel='stylesheet' id='widget-heading-css'
            href={{ asset('/wp-content/plugins/elementor/assets/css/widget-heading.min4189.css') }} media='all' />
        <div data-elementor-type="wp-post" data-elementor-id="78" class="elementor elementor-78">
            <div class="wd-negative-gap elementor-element elementor-element-7a17cac e-flex e-con-boxed e-con e-parent"
                data-id="7a17cac" data-element_type="container" data-e-type="container">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-c27035a e-con-full e-flex e-con e-child"
                        data-id="c27035a" data-element_type="container" data-e-type="container">
                        <div class="elementor-element elementor-element-fb5c8fd e-con-full e-flex e-con e-child"
                            data-id="fb5c8fd" data-element_type="container" data-e-type="container">
                            <div class="elementor-element elementor-element-fdcdee7 e-con-full e-flex e-con e-child"
                                data-id="fdcdee7" data-element_type="container" data-e-type="container">
                                <div class="elementor-element elementor-element-3293301 elementor-widget elementor-widget-wd_image_or_svg"
                                    data-id="3293301" data-element_type="widget" data-e-type="widget"
                                    data-widget_type="wd_image_or_svg.default">
                                    <div class="elementor-widget-container">

                                        <div class="wd-image text-left">
                                            <a href="{{ url('/') }}" aria-label="{{ __('Enlace de imagen') }}">
                                                <img width="150" height="40"
                                                    src="{{ asset('assets/images/logo/gsccontainers-logo-150w.png') }}"
                                                    srcset="{{ asset('assets/images/logo/gsccontainers-logo-150w.png') }} 1x, {{ asset('assets/images/logo/gsccontainers-logo-350w.png') }} 2x"
                                                    class="attachment-167x24 size-167x24" alt="{{ config('app.name') }}"
                                                    decoding="async" loading="lazy" /> </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-8929eaa elementor-widget elementor-widget-wd_text_block"
                                    data-id="8929eaa" data-element_type="widget" data-e-type="widget"
                                    data-widget_type="wd_text_block.default">
                                    <div class="elementor-widget-container">
                                        <link rel="stylesheet" id="wd-text-block-css"
                                            href={{ asset('/wp-content/themes/woodmart/css/parts/el-text-block8833.css') }}
                                            type="text/css" media="all" />
                                        <div class="wd-text-block reset-last-child text-left">

                                            <p>{!! __(
                                                '<strong>:brand</strong> (:legal) — transformation, achat, vente et location de conteneurs maritimes, ainsi que construction de bâtiments. Offres transparentes et accompagnement professionnel.',
                                                [
                                                    'brand' => config('company.brand'),
                                                    'legal' => config('company.legal_name'),
                                                ],
                                            ) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-8a8e9df e-con-full e-flex e-con e-child"
                                data-id="8a8e9df" data-element_type="container" data-e-type="container">
                                <div class="elementor-element elementor-element-7221ba1 elementor-widget__width-initial elementor-widget-tablet__width-initial elementor-widget elementor-widget-wd_toggle"
                                    data-id="7221ba1" data-element_type="widget" data-e-type="widget"
                                    data-widget_type="wd_toggle.default">
                                    <div class="elementor-widget-container">
                                        <link rel="stylesheet" id="wd-el-toggle-css"
                                            href={{ asset('/wp-content/themes/woodmart/css/parts/el-toggle8833.css') }}
                                            type="text/css" media="all" />
                                        <div
                                            class="wd-el-toggle wd-state-static-lg wd-state-static-md-sm wd-state-static-sm wd-active-lg wd-active-md-sm wd-active-sm wd-icon-rotate">
                                            <div class="wd-el-toggle-head wd-role-btn" tabindex="0">
                                                <div class="wd-el-toggle-title title">
                                                    {{ __('Atención al Cliente') }} </div>
                                                <div class="wd-el-toggle-icon"></div>
                                            </div>
                                            <div class="wd-el-toggle-content">
                                                <div class="wd-el-toggle-content-inner">
                                                    <div class="elementor-element elementor-element-a154b20 e-con-full e-flex e-con e-child"
                                                        data-id="a154b20" data-element_type="container"
                                                        data-e-type="container">
                                                        <div class="elementor-element elementor-element-29c5940 elementor-widget elementor-widget-wd_extra_menu_list"
                                                            data-id="29c5940" data-element_type="widget"
                                                            data-e-type="widget"
                                                            data-widget_type="wd_extra_menu_list.default">
                                                            <div class="elementor-widget-container">
                                                                <link rel="stylesheet" id="wd-mod-nav-menu-label-css"
                                                                    href={{ asset('/wp-content/themes/woodmart/css/parts/mod-nav-menu-label8833.css') }}
                                                                    type="text/css" media="all" />
                                                                <ul class="wd-sub-menu wd-sub-accented mega-menu-list">
                                                                    <li class="item-with-label item-label-primary">

                                                                        <ul class="sub-sub-menu">

                                                                            @if (filled(config('company.phone_display')))
                                                                            <li class="item-with-label item-label-primary">
                                                                                <a href="tel:{{ preg_replace('/\s+/', '', (string) config('company.phone')) }}">
                                                                                    {{ config('company.phone_display') }}
                                                                                </a>
                                                                            </li>
                                                                            @endif
                                                                            <li
                                                                                class="item-with-label item-label-primary">
                                                                                <a href="{{ lroute('shop.contact') }}">

                                                                                    {{ __('Contacto') }}
                                                                                </a>
                                                                            </li>

                                                                            <li
                                                                                class="item-with-label item-label-green">
                                                                                <a
                                                                                    href="{{ lroute('shop.shipping-policy') }}">

                                                                                    {{ __('Política de Envíos') }}
                                                                                </a>
                                                                            </li>

                                                                            <li
                                                                                class="item-with-label item-label-primary">
                                                                                <a
                                                                                    href="{{ lroute('shop.return-policy') }}">

                                                                                    {{ __('Política de Devoluciones y Reembolsos') }}
                                                                                </a>
                                                                            </li>

                                                                            <li
                                                                                class="item-with-label item-label-primary">
                                                                                <a
                                                                                    href="{{ lroute('shop.payment-policy') }}">

                                                                                    {{ __('Política de Pago') }}
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-eb77bf9 elementor-widget__width-initial elementor-widget-tablet__width-initial elementor-widget elementor-widget-wd_toggle"
                                    data-id="eb77bf9" data-element_type="widget" data-e-type="widget"
                                    data-widget_type="wd_toggle.default">
                                    <div class="elementor-widget-container">
                                        <div
                                            class="wd-el-toggle wd-state-static-lg wd-state-static-md-sm wd-state-static-sm wd-active-lg wd-active-md-sm wd-active-sm wd-icon-rotate">
                                            <div class="wd-el-toggle-head wd-role-btn" tabindex="0">
                                                <div class="wd-el-toggle-title title">
                                                    {{ __('Información Legal') }} </div>
                                                <div class="wd-el-toggle-icon"></div>
                                            </div>
                                            <div class="wd-el-toggle-content">
                                                <div class="wd-el-toggle-content-inner">
                                                    <div class="elementor-element elementor-element-4deb5af e-con-full e-flex e-con e-child"
                                                        data-id="4deb5af" data-element_type="container"
                                                        data-e-type="container">
                                                        <div class="elementor-element elementor-element-f386791 elementor-widget elementor-widget-wd_extra_menu_list"
                                                            data-id="f386791" data-element_type="widget"
                                                            data-e-type="widget"
                                                            data-widget_type="wd_extra_menu_list.default">
                                                            <div class="elementor-widget-container">
                                                                <ul class="wd-sub-menu wd-sub-accented mega-menu-list">
                                                                    <li class="item-with-label item-label-primary">

                                                                        <ul class="sub-sub-menu">

                                                                            <li
                                                                                class="item-with-label item-label-primary">
                                                                                <a
                                                                                    href="{{ lroute('shop.legal-notice') }}">

                                                                                    {{ __('Aviso Legal') }}
                                                                                </a>
                                                                            </li>

                                                                            <li
                                                                                class="item-with-label item-label-green">
                                                                                <a
                                                                                    href="{{ lroute('shop.terms-of-use') }}">

                                                                                    {{ __('Condiciones Generales de Uso') }}
                                                                                </a>
                                                                            </li>

                                                                            <li
                                                                                class="item-with-label item-label-primary">
                                                                                <a
                                                                                    href="{{ lroute('shop.terms-of-sale') }}">

                                                                                    {{ __('Condiciones Generales de Venta') }}
                                                                                </a>
                                                                            </li>

                                                                            <li
                                                                                class="item-with-label item-label-primary">
                                                                                <a
                                                                                    href="{{ lroute('shop.privacy-policy') }}">

                                                                                    {{ __('Política de Privacidad') }}
                                                                                </a>
                                                                            </li>

                                                                            <li
                                                                                class="item-with-label item-label-primary">
                                                                                <a
                                                                                    href="{{ lroute('shop.cookie-policy') }}">

                                                                                    {{ __('Política de Cookies') }}
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
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
                        <div class="elementor-element elementor-element-29542d2 e-con-full e-flex e-con e-child"
                            data-id="29542d2" data-element_type="container" data-e-type="container"
                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-element elementor-element-0529992 e-con-full e-flex e-con e-child"
                                data-id="0529992" data-element_type="container" data-e-type="container">
                                <div class="elementor-element elementor-element-50645bc elementor-widget elementor-widget-heading"
                                    data-id="50645bc" data-element_type="widget" data-e-type="widget"
                                    data-widget_type="heading.default">
                                    <h2 class="elementor-heading-title elementor-size-default">{{ __('Categorías') }}
                                    </h2>
                                </div>
                                <div class="elementor-element elementor-element-97c0eb8 elementor-widget elementor-widget-wd_mega_menu"
                                    data-id="97c0eb8" data-element_type="widget" data-e-type="widget"
                                    data-widget_type="wd_mega_menu.default">
                                    <div class="elementor-widget-container">
                                        <link rel="stylesheet" id="wd-el-menu-css"
                                            href={{ asset('/wp-content/themes/woodmart/css/parts/el-menu8833.css') }}
                                            type="text/css" media="all" />
                                        <link rel="stylesheet" id="wd-el-menu-wpb-elem-css"
                                            href={{ asset('/wp-content/themes/woodmart/css/parts/el-menu-wpb-elem8833.css') }}
                                            type="text/css" media="all" />
                                        <div class="wd-menu widget_nav_mega_menu wd-nav-wrapper text-center">
                                            <ul id="menu-category-menu-edc"
                                                class="menu wd-nav wd-nav-horizontal wd-gap-s wd-style-default">
                                                @foreach ($navTree as $entry)
                                                    @if ($entry['children']->isNotEmpty())
                                                        @foreach ($entry['children'] as $child)
                                                            <li
                                                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat item-level-0 menu-simple-dropdown wd-event-hover {{ $child['active'] ? 'current-menu-item current_page_item' : '' }}">
                                                                <a href="{{ $child['href'] }}"
                                                                    class="woodmart-nav-link"><span
                                                                        class="nav-link-text">{{ $child['label'] }}</span></a>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li
                                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat item-level-0 menu-simple-dropdown wd-event-hover {{ $entry['active'] ? 'current-menu-item current_page_item' : '' }}">
                                                            <a href="{{ $entry['href'] }}"
                                                                class="woodmart-nav-link"><span
                                                                    class="nav-link-text">{{ $entry['label'] }}</span></a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-8fe6ad4 e-con-full e-flex e-con e-child"
                        data-id="8fe6ad4" data-element_type="container" data-e-type="container">
                        <div class="elementor-element elementor-element-c6bfab0 wd-width-100 elementor-widget elementor-widget-wd_title"
                            data-id="c6bfab0" data-element_type="widget" data-e-type="widget"
                            data-widget_type="wd_title.default">
                            <div class="elementor-widget-container">
                                <link rel="stylesheet" id="wd-section-title-css"
                                    href={{ asset('/wp-content/themes/woodmart/css/parts/el-section-title8833.css') }}
                                    type="text/css" media="all" />
                                <div
                                    class="title-wrapper wd-set-mb reset-last-child wd-title-color-default wd-title-style-default wd-title-size-default text-left">


                                    <div class="liner-continer">
                                        <h4 class="woodmart-title-container title wd-fontsize-l">{{ __('Contacto') }}
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-b553f7d elementor-widget elementor-widget-html"
                            data-id="b553f7d" data-element_type="widget" data-e-type="widget"
                            data-widget_type="html.default">
                            <div class="mm-footer-company">
                                <strong class="mm-footer-company-name">{{ config('company.legal_name') }}</strong>
                                <p class="mm-footer-address">
                                    {{ config('company.trade_name') }} — {{ config('company.legal_form') }}<br>
                                    {{ __('SIRET') }} : {{ config('company.siret') }}<br>
                                    {{ __('TVA') }} : {{ config('company.vat_number') }}<br>
                                    {{ __('RCS') }} {{ config('company.rcs_city') }} {{ config('company.rcs_number') }}<br>
                                    {{ config('company.address_line1') }}<br>
                                    {{ config('company.address_line2') }}<br>
                                    {{ config('company.postal_code') }} {{ config('company.city') }}<br>
                                    {{ config('company.region') }}, {{ config('company.country') }}
                                </p>
                                <p class="mm-footer-contact">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                                        stroke="currentColor" stroke-width="1.5">
                                        <path
                                            d="M3 6l9 7 9-7M3 6v12a1 1 0 001 1h16a1 1 0 001-1V6a1 1 0 00-1-1H4a1 1 0 00-1 1z" />
                                    </svg>
                                    <a href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a>
                                </p>
                                <p class="mm-footer-contact">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                                        stroke="currentColor" stroke-width="1.5">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M3 12h18M12 3a15 15 0 010 18M12 3a15 15 0 000 18" />
                                    </svg>
                                    <a href="{{ url('/') }}">{{ config('company.brand') }}</a>
                                </p>
                                @if (filled(config('company.phone_display')))
                                    <p class="mm-footer-contact">
                                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                                            stroke="currentColor" stroke-width="1.5">
                                            <path
                                                d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z" />
                                        </svg>
                                        <a href="tel:{{ preg_replace('/\s+/', '', (string) config('company.phone')) }}">{{ config('company.phone_display') }}</a>
                                    </p>
                                @endif
                                <p class="mm-footer-contact">&copy; {{ date('Y') }} {{ config('company.legal_name') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wd-negative-gap elementor-element elementor-element-44f581e e-flex e-con-boxed e-con e-parent"
                data-id="44f581e" data-element_type="container" data-e-type="container">
                <div class="e-con-inner">
                    <div class="elementor-element elementor-element-91cba70 elementor-widget elementor-widget-wd_text_block"
                        data-id="91cba70" data-element_type="widget" data-e-type="widget"
                        data-widget_type="wd_text_block.default">
                        <div class="elementor-widget-container">
                            <div class="wd-text-block reset-last-child text-left">

                                <p>© {{ date('Y') }} {{ config('company.legal_name') }}. {{ __('Todos los derechos reservados.') }}</p>
                            </div>
                        </div>
                    </div>
                    <style>
                       .mm-footer-payments {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
}

.mm-footer-payments img {
    height: 26px;
    width: auto;
    max-width: 48px;
    object-fit: contain;
    display: block;
}

/* Fond clair pour les logos sombres sur fond noir */
.mm-footer-payments img.mm-payment-light-bg {
    background: #fff;
    border-radius: 4px;
    padding: 2px 4px;
    box-sizing: content-box;
}

                    </style>
                    <div class="elementor-element elementor-element-e3192de elementor-widget elementor-widget-html"
                        data-id="e3192de" data-element_type="widget" data-e-type="widget"
                        data-widget_type="html.default">
                        <div class="elementor-widget-container">
                            <div class="mm-footer-payments">
                                <img src="{{ asset('assets/images/payements/visa.svg') }}" alt="Visa" width="40" height="26" loading="lazy" decoding="async" />
                                <img src="{{ asset('assets/images/payements/master.svg') }}" alt="Mastercard" width="40" height="26" loading="lazy" decoding="async" />
                                <img src="{{ asset('assets/images/payements/paypal.svg') }}" alt="PayPal" width="40" height="26" loading="lazy" decoding="async" />
                                <img src="{{ asset('assets/images/payements/apple_pay.svg') }}" alt="Apple Pay" width="40" height="26" loading="lazy" decoding="async" />
                                <img src="{{ asset('assets/images/payements/google_pay.svg') }}" alt="Google Pay" width="40" height="26" loading="lazy" decoding="async" />
                                <img src="{{ asset('assets/images/payements/mb-way.png') }}" alt="MB WAY" width="40" height="26" loading="lazy" decoding="async" />
                                <img src="{{ asset('assets/images/payements/multibanco.svg') }}" alt="Multibanco" width="40" height="26" loading="lazy" decoding="async" class="mm-payment-light-bg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<a href="https://wa.me/34603547522?text={{ urlencode(__('¡Hola! Me gustaría recibir más información sobre vuestros productos.')) }}"
    target="_blank" rel="noopener noreferrer" class="pellets-wa-float"
    aria-label="{{ __('Contactar por WhatsApp') }}">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28"
        aria-hidden="true">
        <path
            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z">
        </path>
        <path
            d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.116 1.526 5.845L.057 23.926a.5.5 0 0 0 .612.612l6.081-1.469A11.934 11.934 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.9a9.878 9.878 0 0 1-5.031-1.374l-.36-.214-3.733.902.918-3.646-.235-.375A9.867 9.867 0 0 1 2.1 12C2.1 6.534 6.534 2.1 12 2.1S21.9 6.534 21.9 12 17.466 21.9 12 21.9z">
        </path>
    </svg>
    <span class="pellets-wa-tooltip">{{ __('¿Necesitas ayuda?') }}</span>

</a>




<div class="wd-close-side wd-fill"></div>
<link rel="stylesheet" id="wd-scroll-top-css"
    href={{ asset('/wp-content/themes/woodmart/css/parts/opt-scrolltotop8833.css') }} type="text/css"
    media="all" /> <a href="#" class="scrollToTop"
    aria-label="{{ __('Botón de desplazamiento hacia arriba') }}"></a>
<link rel="stylesheet" id="wd-header-search-fullscreen-css"
    href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-search-fullscreen-general8833.css') }}
    type="text/css" media="all" />
<link rel="stylesheet" id="wd-header-search-fullscreen-1-css"
    href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-search-fullscreen-18833.css') }} type="text/css"
    media="all" />
<link rel="stylesheet" id="wd-wd-search-form-css"
    href={{ asset('/wp-content/themes/woodmart/css/parts/wd-search-form8833.css') }} type="text/css"
    media="all" />
<link rel="stylesheet" id="wd-wd-search-results-css"
    href={{ asset('/wp-content/themes/woodmart/css/parts/wd-search-results8833.css') }} type="text/css"
    media="all" />
<link rel="stylesheet" id="wd-search-style-default-css"
    href={{ asset('/wp-content/themes/woodmart/css/parts/el-search-style-default8833.css') }} type="text/css"
    media="all" />
<div class="wd-search-full-screen wd-scroll wd-fill" role="complementary" aria-label="{{ __('Buscar') }}">
    <span class="wd-close-search wd-action-btn wd-style-icon wd-cross-icon">
        <a href="#" rel="nofollow" aria-label="{{ __('Cerrar formulario de búsqueda') }}">
            <span class="wd-action-icon"></span>
        </a>
    </span>


    <form role="search" method="get" class="searchform  wd-style-default woodmart-ajax-search"
        action="{{ lroute('shop.search') }}" data-thumbnail="1" data-price="1" data-post_type="product"
        data-count="20" data-sku="0" data-symbols_count="3" data-include_cat_search="no" autocomplete="off">
        <input type="text" class="s" placeholder="{{ __('Buscar productos') }}"
            value="{{ request('q') }}" name="q" aria-label="{{ __('Buscar') }}"
            title="{{ __('Buscar productos') }}" required />



        <button type="submit" class="searchsubmit">
            <span>
                {{ __('Buscar') }} </span>
        </button>
    </form>

    <div class="wd-search-loader wd-fill"></div>




    <div class="wd-search-results  wd-scroll-content"></div>

    <div class="wd-search-info-text">{{ __('Empiece a escribir para ver los productos que busca.') }}</div>

</div>
<div class="mobile-nav wd-side-hidden wd-side-hidden-nav wd-left wd-opener-arrow" role="navigation"
    aria-label="{{ __('Navegación móvil') }}">
    <div class="wd-search-form ">
        <link rel="stylesheet" id="wd-wd-search-dropdown-css"
            href={{ asset('/wp-content/themes/woodmart/css/parts/wd-search-dropdown8833.css') }} type="text/css"
            media="all" />
        <form role="search" method="get" class="searchform  wd-style-default woodmart-ajax-search"
            action="{{ lroute('shop.search') }}" data-thumbnail="1" data-price="1" data-post_type="product"
            data-count="20" data-sku="0" data-symbols_count="3" data-include_cat_search="no" autocomplete="off">
            <input type="text" class="s" placeholder="{{ __('Buscar productos') }}"
                value="{{ request('q') }}" name="q" aria-label="{{ __('Buscar') }}"
                title="{{ __('Buscar productos') }}" required />

            <span tabindex="0" aria-label="{{ __('Borrar búsqueda') }}"
                class="wd-clear-search wd-role-btn wd-hide"></span>


            <button type="submit" class="searchsubmit">
                <span>
                    {{ __('Buscar') }} </span>
            </button>
        </form>

        <div class="wd-search-results-wrapper">
            <div class="wd-search-results wd-dropdown-results wd-dropdown wd-scroll">
                <div class="wd-scroll-content">


                </div>
            </div>
        </div>

    </div>
    <ul id="menu-main-menu-edc-1"
        class="mobile-pages-menu menu wd-nav wd-nav-mobile wd-dis-hover wd-layout-dropdown wd-active">
        <li
            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-120 menu-item-6034 item-level-0 {{ request()->routeIs('*.home') ? 'current-menu-item current_page_item' : '' }}">
            <a href="{{ lroute('home') }}" class="woodmart-nav-link"><span
                    class="nav-link-text">{{ __('Inicio') }}</span></a>
        </li>
        @foreach ($navTree as $entry)
            <li
                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat item-level-0 {{ $entry['active'] ? 'current-menu-item current_page_item' : '' }}">
                <a href="{{ $entry['href'] }}" class="woodmart-nav-link"><span
                        class="nav-link-text">{{ $entry['label'] }}</span></a>
                @if ($entry['children']->isNotEmpty())
                    <ul class="wd-sub-menu">
                        @foreach ($entry['children'] as $child)
                            <li
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_cat item-level-1 {{ $child['active'] ? 'current-menu-item current_page_item' : '' }}">
                                <a href="{{ $child['href'] }}" class="woodmart-nav-link">{{ $child['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6056 item-level-0"><a
                href="{{ lroute('shop.contact') }}" class="woodmart-nav-link"><span
                    class="nav-link-text">{{ __('Contáctanos') }}</span></a></li>
    </ul>
</div>
<link rel="stylesheet" id="wd-widget-general-css"
    href={{ asset('/wp-content/themes/woodmart/css/parts/widget-general8833.css') }} type="text/css"
    media="all" />
<link rel="stylesheet" id="wd-widget-shopping-cart-css"
    href={{ asset('/wp-content/themes/woodmart/css/parts/woo-widget-shopping-cart8833.css') }} type="text/css"
    media="all" />
<div class="cart-widget-side wd-side-hidden wd-right" role="complementary"
    aria-label="{{ __('Barra lateral del carrito de compra') }}">
    <div class="wd-heading">
        <span class="title">{{ __('Carrito de compra') }}</span>
        <div class="close-side-widget wd-action-btn wd-style-text wd-cross-icon">
            <a href="#" rel="nofollow">
                <span class="wd-action-icon"></span>
                <span class="wd-action-text">
                    {{ __('Cerrar') }} </span>
            </a>
        </div>
    </div>
    <div class="widget woocommerce widget_shopping_cart">
        <div class="widget_shopping_cart_content"></div>
    </div>
</div>
<link rel="stylesheet" id="wd-bottom-toolbar-css"
    href={{ asset('/wp-content/themes/woodmart/css/parts/opt-bottom-toolbar8833.css') }} type="text/css"
    media="all" />
<div class="wd-toolbar wd-toolbar-label-show" role="complementary"
    aria-label="{{ __('Barra de herramientas fija') }}">
    <div class="wd-toolbar-shop wd-toolbar-item wd-tools-element">
        <a href="{{ lroute('shop.index') }}">
            <span class="wd-tools-icon"></span>
            <span class="wd-toolbar-label">
                {{ __('Tienda') }} </span>
        </a>
    </div>
    <div class="wd-header-cart wd-tools-element wd-design-5 cart-widget-opener" title="{{ __('Mi carrito') }}">
        <a href="{{ lroute('shop.carrito') }}">
            <span class="wd-tools-icon">
                <span class="wd-cart-number wd-tools-count">380 <span>{{ __('artículos') }}</span></span>
            </span>
            <span class="wd-toolbar-label">
                {{ __('Carrito') }} </span>
        </a>
    </div>
    <div class="wd-header-my-account wd-tools-element wd-style-icon ">
        <a href="{{ lroute('shop.my-account') }}">
            <span class="wd-tools-icon"></span>
            <span class="wd-toolbar-label">
                {{ __('Mi cuenta') }} </span>
        </a>
    </div>
</div>


<link rel='stylesheet' id='wd-style-base-deferred-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/base-deferred8833.css') }} media='all' />
<link rel='stylesheet' id='wd-woocommerce-base-deferred-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/woocommerce-base-deferred8833.css') }} media='all' />
<link rel='stylesheet' id='wd-mod-notices-general-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/mod-notices-general8833.css') }} media='all' />
<link rel='stylesheet' id='wd-woocommerce-block-notices-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/woo-mod-block-notices8833.css') }} media='all' />
<link rel='stylesheet' id='wd-header-opt-sticky-shadow-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/header-opt-sticky-shadow8833.css') }} media='all' />
<link rel='stylesheet' id='wd-header-opt-scroll-stick-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/header-opt-scroll-stick8833.css') }} media='all' />
<link rel='stylesheet' id='wd-header-my-account-dropdown-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-my-account-dropdown8833.css') }} media='all' />
<link rel='stylesheet' id='wd-woo-mod-login-form-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/woo-mod-login-form8833.css') }} media='all' />
<link rel='stylesheet' id='wd-swiper-arrows-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/lib-swiper-arrows8833.css') }} media='all' />
<link rel='stylesheet' id='wd-header-mobile-nav-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-mobile-nav8833.css') }} media='all' />
<link rel='stylesheet' id='wd-nav-opener-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/mod-nav-opener8833.css') }} media='all' />
<link rel='stylesheet' id='wd-header-cart-side-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/header-el-cart-side8833.css') }} media='all' />
<link rel='stylesheet' id='wd-widget-product-list-css'
    href={{ asset('/wp-content/themes/woodmart/css/parts/woo-widget-product-list8833.css') }} media='all' />




<script id="fluentform-elementor-js"
    src={{ asset('/wp-content/plugins/fluentform/assets/js/fluent-forms-elementor-widgetd7df.js') }}></script>
<script id="wp-hooks-js" src="wp-includes/js/dist/hooks.min4ce2.js"></script>
<script id="wp-i18n-js" src="wp-includes/js/dist/i18n.min99af.js"></script>

<script id="sourcebuster-js-js"
    src={{ asset('/wp-content/plugins/woocommerce/assets/js/sourcebuster/sourcebuster.min345d.js') }}></script>


<script id="disco-plugin-script-js" src={{ asset('/wp-content/plugins/disco/assets/build/plugin-publicf896.js') }}
    async="async"></script>
<script id="elementor-webpack-runtime-js"
    src={{ asset('/wp-content/plugins/elementor/assets/js/webpack.runtime.min4189.js') }}></script>
<script id="elementor-frontend-modules-js"
    src={{ asset('/wp-content/plugins/elementor/assets/js/frontend-modules.min4189.js') }}></script>

<script id="jquery-ui-core-js" src="wp-includes/js/jquery/ui/core.min0a10.js"></script>

<script id="woodmart-theme-js" src={{ asset('/wp-content/themes/woodmart/js/scripts/global/helpers.min8833.js') }}>
</script>
<script id="wd-elementor-integration-js"
    src={{ asset('/wp-content/themes/woodmart/js/scripts/global/elementor-integration.min8833.js') }}></script>


<script id="wd-swiper-library-js" src={{ asset('/wp-content/themes/woodmart/js/libs/swiper.min8833.js') }}></script>




<script id="wd-scroll-top-js" src={{ asset('/wp-content/themes/woodmart/js/scripts/global/scrollTop.min8833.js') }}>
</script>
<script id="wd-search-full-screen-js"
    src={{ asset('/wp-content/themes/woodmart/js/scripts/global/searchFullScreen.min8833.js') }}></script>


<script id="wd-mobile-navigation-js"
    src={{ asset('/wp-content/themes/woodmart/js/scripts/menu/mobileNavigation.min8833.js') }}></script>

<script id="wd-cart-widget-js" src={{ asset('/wp-content/themes/woodmart/js/scripts/wc/cartWidget.min8833.js') }}>
</script>

<script data-wp-strategy="defer" defer id="wc-cart-fragments-js"
    src={{ asset('/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min345d.js') }}></script>
