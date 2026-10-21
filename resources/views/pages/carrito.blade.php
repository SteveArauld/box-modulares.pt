@extends('layouts.app')

@section('title', 'Carrito de compra | '.config('app.name'))

@section('body_class', 'woocommerce-cart page')

<style>
    div.quantity {
        --wd-form-height: 42px;
        display: inline-flex;
        vertical-align: top;
        white-space: nowrap
    }

    div.quantity input[type=number]::-webkit-inner-spin-button,
    div.quantity input[type=number]::-webkit-outer-spin-button,
    div.quantity input[type=number] {
        margin: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none
    }

    div.quantity :is(input[type=number],
        input[type=text],
        input[type=button]) {
        display: inline-block;
        color: var(--wd-form-color);
        min-height: var(--wd-form-height);
        height: unset
    }

    div.quantity input[type=number] {
        width: 30px;
        border-radius: 0;
        border-right: none;
        border-left: none
    }

    div.quantity input[type=text] {
        width: var(--quantity-space, 80px);
        text-align: center
    }

    div.quantity input[type=button] {
        padding: 0 5px;
        min-width: 25px;
        border: var(--wd-form-brd-width) solid var(--wd-form-brd-color);
        background: var(--wd-form-bg);
        box-shadow: none
    }

    div.quantity input[type=button]:hover {
        color: #fff;
        background-color: #3964fe;
        border-color: #3964fe
    }

    div.quantity .minus {
        border-start-start-radius: var(--wd-form-brd-radius);
        border-end-start-radius: var(--wd-form-brd-radius)
    }

    div.quantity .plus {
        border-start-end-radius: var(--wd-form-brd-radius);
        border-end-end-radius: var(--wd-form-brd-radius)
    }

    div.quantity.hidden {
        display: none !important
    }

    .form-style-underlined div.quantity input[type=number],
    .form-style-underlined div.quantity input[type=text] {
        border-top-style: solid
    }

    @-moz-document url-prefix() {
        div.quantity input[type=number] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield
        }
    }

    .wd-product-grid-slider {
        display: flex;
        z-index: 1
    }

    .wd-product-grid-slide {
        flex-grow: 1
    }

    .wd-product-grid-slider-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        height: 100%;
        z-index: 4;
        --arrow-color: var(--color-gray-800);
        --arrow-color-hover: var(--color-gray-500);
        pointer-events: none
    }

    .wd-product-grid-slider-nav>div {
        display: flex;
        align-items: center;
        transition: inherit;
        width: 30px;
        height: 30px;
        opacity: 0;
        visibility: hidden;
        transition: all .3s ease;
        color: var(--arrow-color);
        pointer-events: auto
    }

    .wd-product-grid-slider-nav>div:before {
        font-family: "woodmart-font";
        vertical-align: middle
    }

    .wd-product-grid-slider-nav>div:hover {
        color: var(--arrow-color-hover)
    }

    .wd-product-grid-slider-nav .wd-prev {
        transform: translateX(-25px);
        text-align: start;
        padding-inline-start: 8px;
        justify-content: flex-start
    }

    .wd-product-grid-slider-nav .wd-prev:before {
        content: "\f114"
    }

    .wd-product-grid-slider-nav .wd-next {
        transform: translateX(25px);
        text-align: end;
        padding-inline-end: 8px;
        justify-content: flex-end
    }

    .wd-product-grid-slider-nav .wd-next:before {
        content: "\f113"
    }

    .wd-product-grid-slider-pagin {
        position: absolute;
        bottom: 0;
        inset-inline: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        transition: all .3s ease;
        filter: invert(90%);
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        z-index: 2
    }

    .wd-product-grid-slider-dot {
        flex-grow: 1;
        height: 4px;
        background-color: #242424;
        transition: all .25s ease;
        opacity: .2
    }

    .wd-product-grid-slider-dot.wd-active {
        opacity: .6
    }

    .wd-product:not(:is(.product-swatched,
            .quick-shop-shown,
            .wd-variation-active,
            [class*=wd-loading])):hover :is(.wd-product-grid-slider-nav>div,
        .wd-product-grid-slider-pagin) {
        opacity: 1;
        visibility: visible;
        transform: none
    }

    @media(max-width: 1024px) {

        .wd-product:not(:is(.product-swatched,
                .quick-shop-shown,
                .wd-variation-active,
                [class*=wd-loading])) .wd-product-grid-slider-nav>div {
            opacity: 1;
            visibility: visible;
            transform: none;
            width: 40px;
            height: 50px
        }

        :is(.wd-product-grid-slider,
            .wd-product-grid-slider-pagin) {
            display: none
        }
    }

    .title-wrapper {
        --wd-mb: 10px
    }

    .title-wrapper [class*=title] {
        display: inline-block
    }

    .title-wrapper .title {
        margin-bottom: 0
    }

    .title-wrapper .img-wrapper {
        display: block;
        margin-top: 10px
    }

    .subtitle-color-black.subtitle-style-default {
        color: #000
    }

    .subtitle-color-black.subtitle-style-background {
        background-color: #333;
        color: #fff
    }

    .subtitle-color-white.subtitle-style-default {
        color: hsla(0, 0%, 100%, .8)
    }

    .subtitle-color-white.subtitle-style-background {
        background-color: hsla(0, 0%, 100%, .8);
        color: #242424
    }

    .subtitle-color-gradient.subtitle-style-default {
        color: var(--color-gray-400)
    }

    .subtitle-color-gradient.subtitle-style-background {
        background-color: #f1f1f1;
        color: #333
    }

    .wd-title-color-default {
        --el-title-color: rgba(0, 0, 0, 0.105)
    }

    .wd-title-color-primary {
        --el-title-color: #3964fe
    }

    .wd-title-color-alt {
        --el-title-color: var(--wd-alternative-color)
    }

    .wd-title-color-black {
        --el-title-color: #000
    }

    .wd-title-color-white {
        color: var(--wd-text-color);
        --wd-text-color: rgba(255, 255, 255, 0.8);
        --wd-title-color: #FFF;
        --el-title-color: #FFF
    }

    .wd-title-color-gradient .title {
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: rgba(0, 0, 0, 0)
    }

    .wd-title-style-shadow {
        padding: 25px;
        border-radius: var(--wd-brd-radius);
        box-shadow: 0 0 8px rgba(0, 0, 0, .12)
    }

    .wpb-js-composer .title-wrapper {
        --content-width: var(--wd-max-width)
    }

    .wpb-js-composer .title-wrapper [class*=title] {
        max-width: var(--content-width)
    }

    .wpb-js-composer .title-wrapper.wd-title-empty .liner-continer {
        margin-bottom: 0
    }

    .wpb-js-composer .title-wrapper.wd-title-empty .liner-continer .title {
        display: none
    }

    @media(max-width: 1024px) {

        .title-subtitle.wd-fontsize-m,
        .title-after_title.wd-fontsize-s {
            font-size: 14px
        }
    }

    @media(max-width: 576px) {
        .title-wrapper .title-subtitle {
            font-size: 12px
        }

        .title-wrapper .title {
            font-size: 20px
        }
    }

    .wd-carousel-container {
        --wd-width: 100%;
        position: relative;
        width: var(--wd-width)
    }

    .wd-carousel-inner {
        position: relative;
        margin: -15px 0
    }

    .wd-carousel {
        position: relative;
        overflow-x: var(--wd-carousel-overflow, clip);
        overflow-y: var(--wd-carousel-overflow, unset);
        padding: 15px 0;
        margin-inline: calc(var(--wd-gap)/-2);
        touch-action: pan-y
    }

    @supports not (overflow: clip) {
        .wd-carousel {
            overflow: var(--wd-carousel-overflow, hidden)
        }
    }

    .wd-carousel-wrap {
        position: relative;
        width: 100%;
        height: 100%;
        z-index: 1;
        display: flex;
        transition-property: transform;
        transition-timing-function: initial;
        box-sizing: content-box;
        transform: translate3d(0px, 0, 0)
    }

    .wd-carousel-item {
        position: relative;
        height: 100%;
        flex: 0 0 calc(100%/var(--wd-col));
        max-width: calc(100%/var(--wd-col));
        padding: 0 calc(var(--wd-gap)/2);
        transition-property: transform;
        transform: translate3d(0px, 0, 0)
    }

    .wd-backface-hidden .wd-carousel-item {
        transform: translateZ(0);
        backface-visibility: hidden
    }

    .wd-carousel[data-center_mode=yes] .wd-carousel-wrap:not([style]) {
        transform: translate3d(calc(50% - 100% / var(--wd-col) / 2), 0, 0)
    }

    .wd-autoheight,
    .wd-autoheight .wd-carousel-item {
        height: auto
    }

    .wd-autoheight .wd-carousel-wrap {
        align-items: flex-start;
        transition-property: transform, height
    }

    @media(min-width: 1025px) {
        .wd-carousel-container:not(.wd-off-lg) [style*="col-lg:1;"]:not(.wd-initialized)>.wd-carousel-wrap>.wd-carousel-item:nth-child(n+2) {
            display: none
        }
    }

    @media(max-width: 768.98px) {
        .wd-carousel-container:not(.wd-off-sm) [style*="col-sm:1;"]:not(.wd-initialized)>.wd-carousel-wrap>.wd-carousel-item:nth-child(n+2) {
            display: none
        }
    }

    @media(min-width: 769px)and (max-width: 1024px) {
        .wd-carousel-container:not(.wd-off-md) [style*="col-md:1;"]:not(.wd-initialized)>.wd-carousel-wrap>.wd-carousel-item:nth-child(n+2) {
            display: none
        }
    }

    .wd-cart-totals:not(.wd-title-show) .cart-totals-inner>h2 {
        display: none
    }

    .wd-cart-totals .wc-proceed-to-checkout {
        display: flex;
        flex-direction: column
    }

    .wd-cart-totals .wc-proceed-to-checkout .checkout-button {
        align-self: var(--wd-btn-align, start)
    }

    .woocommerce-shipping-methods {
        --li-pl: 0;
        margin-bottom: 0;
        list-style: none
    }

    .woocommerce-shipping-methods input.shipping_method {
        position: relative;
        top: 4px;
        float: right;
        margin-inline-end: 0;
        margin-inline-start: 7px
    }

    .woocommerce-shipping-methods label {
        margin-bottom: 0
    }

    :is(.wd-empty-block-title,
        .wd-empty-block-text,
        .return-to-shop) {
        text-align: center
    }

    .cart-empty {
        --wd-empty-block-icon: "\f147"
    }

    .return-to-shop {
        --wd-tags-mb: .001px
    }

    .return-to-shop .button {
        padding: var(--btn-accented-padding, var(--btn-padding, 5px 20px));
        min-height: var(--btn-accented-height, var(--btn-height, 42px));
        font-size: var(--btn-accented-font-size, var(--btn-font-size, 13px));
        border-radius: var(--btn-accented-brd-radius);
        color: var(--btn-accented-color);
        box-shadow: var(--btn-accented-box-shadow);
        background-color: var(--btn-accented-bgcolor);
        text-transform: var(--btn-accented-transform, var(--btn-transform, uppercase));
        font-weight: var(--btn-accented-font-weight, var(--btn-font-weight, 600));
        font-family: var(--btn-accented-font-family, var(--btn-font-family, inherit));
        font-style: var(--btn-accented-font-style, var(--btn-font-style, unset))
    }

    .return-to-shop .button:hover {
        color: var(--btn-accented-color-hover);
        box-shadow: var(--btn-accented-box-shadow-hover);
        background-color: var(--btn-accented-bgcolor-hover)
    }

    .return-to-shop .button:active {
        box-shadow: var(--btn-accented-box-shadow-active);
        bottom: var(--btn-accented-bottom-active, 0)
    }

    .woocommerce-cart-form>.cart {
        margin-bottom: 0
    }

    .woocommerce-cart-form>.cart tbody {
        position: relative
    }

    .woocommerce-cart-form>.cart .wd-cart-action-row td {
        border-bottom: none;
        padding: 0
    }

    .woocommerce-cart-form>.cart .cart-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: start;
        gap: 30px;
        margin-top: 30px
    }

    .wd-coupon-form {
        display: flex;
        flex-wrap: wrap;
        flex-grow: 1;
        gap: 10px;
        text-align: start
    }

    .wd-coupon-form .input-text {
        max-width: 230px;
        height: unset;
        min-height: var(--wd-form-height)
    }

    .wd-coupon-form .input-text.has-error {
        --wd-form-brd-color: #CA1919;
        --wd-form-brd-color-focus: #CA1919
    }

    .wd-coupon-form .coupon-error-notice {
        --wd-tags-mb: 0;
        flex: 1 1 100%;
        color: #ca1919
    }

    .wd-coupon-form .button {
        flex: 0 0 auto
    }

    @media(max-width: 768.98px) {
        .woocommerce-cart-form>.cart .wd-cart-action-row {
            padding: 0;
            border-bottom: none;
            min-height: auto
        }

        .woocommerce-cart-form>.cart .wd-cart-action-row td:before {
            content: none
        }

        .woocommerce-cart-form>.cart .cart-actions {
            flex: 1 1 auto;
            align-items: stretch;
            flex-direction: column;
            margin-top: 15px
        }

        .wd-coupon-form {
            order: 2;
            flex-direction: column
        }

        .wd-coupon-form .input-text {
            max-width: none
        }
    }

    .cart-totals-inner>h2 {
        text-transform: uppercase;
        font-size: 22px
    }

    .cart-totals-inner table tr:last-child :is(th,
        td) {
        border-bottom: none
    }

    .cart-totals-inner table .cart-subtotal .amount {
        color: var(--wd-text-color);
        font-weight: 400
    }

    .cart-totals-inner tr.shipping td>* {
        margin-bottom: 10px
    }

    .cart-totals-inner tr.shipping td>*:last-child {
        margin-bottom: 0
    }

    .cart-totals-inner .shipping-calculator-button {
        --wd-link-decor: none;
        --wd-link-decor-hover: none;
        color: #3964fe;
        font-weight: 600
    }

    .cart-totals-inner .shipping-calculator-form {
        margin-top: 20px
    }

    .cart-totals-inner .shipping-calculator-form .button {
        padding: 5px 14px;
        min-height: 36px;
        font-size: 12px;
        border-radius: var(--btn-default-brd-radius);
        color: var(--btn-default-color);
        box-shadow: var(--btn-default-box-shadow);
        background-color: var(--btn-default-bgcolor);
        text-transform: var(--btn-default-transform, var(--btn-transform, uppercase));
        font-weight: var(--btn-default-font-weight, var(--btn-font-weight, 600));
        font-family: var(--btn-default-font-family, var(--btn-font-family, inherit));
        font-style: var(--btn-default-font-style, var(--btn-font-style, unset))
    }

    .cart-totals-inner .shipping-calculator-form .button:hover {
        color: var(--btn-default-color-hover);
        box-shadow: var(--btn-default-box-shadow-hover);
        background-color: var(--btn-default-bgcolor-hover)
    }

    .cart-totals-inner .shipping-calculator-form .button:active {
        box-shadow: var(--btn-default-box-shadow-active);
        bottom: var(--btn-default-bottom-active)
    }

    .cart-totals-inner .checkout-button {
        padding: var(--btn-accented-padding, var(--btn-padding, 5px 20px));
        min-height: var(--btn-accented-height, var(--btn-height, 42px));
        font-size: var(--btn-accented-font-size, var(--btn-font-size, 13px));
        border-radius: var(--btn-accented-brd-radius);
        color: var(--btn-accented-color);
        box-shadow: var(--btn-accented-box-shadow);
        background-color: var(--btn-accented-bgcolor);
        text-transform: var(--btn-accented-transform, var(--btn-transform, uppercase));
        font-weight: var(--btn-accented-font-weight, var(--btn-font-weight, 600));
        font-family: var(--btn-accented-font-family, var(--btn-font-family, inherit));
        font-style: var(--btn-accented-font-style, var(--btn-font-style, unset))
    }

    .cart-totals-inner .checkout-button:hover {
        color: var(--btn-accented-color-hover);
        box-shadow: var(--btn-accented-box-shadow-hover);
        background-color: var(--btn-accented-bgcolor-hover)
    }

    .cart-totals-inner .checkout-button:active {
        box-shadow: var(--btn-accented-box-shadow-active);
        bottom: var(--btn-accented-bottom-active, 0)
    }

    .wc-proceed-to-checkout>* {
        margin-bottom: 10px
    }

    .wc-proceed-to-checkout>*:last-child {
        margin-bottom: 0
    }

    @media(max-width: 768.98px) {
        .cart-totals-inner>h2 {
            padding-inline-start: 0
        }

        .cart-totals-inner .shop_table_responsive tr:last-child {
            padding-bottom: 0;
            border-bottom: 0
        }

        .cart-totals-inner .shop_table_responsive tr.shipping td {
            gap: 10px;
            text-align: start
        }

        .cart-totals-inner .shop_table_responsive tr.shipping td>* {
            margin-bottom: 0;
            flex: 1 1 100%
        }

        .cart-totals-inner .shop_table_responsive tr.order-total td>*:not(strong) {
            flex: 1 1 100%
        }

        .cart-totals-inner .shop_table_responsive td:before {
            color: var(--wd-title-color);
            font-weight: var(--wd-title-font-weight);
            font-style: var(--wd-title-font-style);
            font-family: var(--wd-title-font)
        }

        .cart-totals-inner .shop_table_responsive .woocommerce-shipping-methods input.shipping_method {
            float: left;
            margin-inline: 0 7px
        }

        .rtl .cart-totals-inner .shop_table_responsive .woocommerce-shipping-methods input.shipping_method {
            float: right
        }
    }

    .wd-page-title {
        --wd-align: start;
        --wd-title-sp: 15px;
        --wd-title-font-s: 36px;
        position: relative;
        padding-block: var(--wd-title-sp)
    }

    .wd-page-title .container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: var(--wd-align);
        text-align: var(--wd-align);
        gap: 10px
    }

    .wd-page-title .title {
        font-size: var(--wd-title-font-s);
        line-height: 1.2;
        margin-bottom: 0
    }

    .wd-page-title-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover
    }

    .title-design-centered {
        --wd-align: center
    }

    @media(min-width: 1025px) {
        .title-size-small {
            --wd-title-sp: 20px;
            --wd-title-font-s: 44px
        }

        .title-size-default {
            --wd-title-sp: 60px;
            --wd-title-font-s: 68px
        }

        .title-size-large {
            --wd-title-sp: 100px;
            --wd-title-font-s: 78px
        }
    }

    .wd-page-title-el .wd-page-title {
        border-radius: inherit
    }

    .wd-page-title-el.wd-stretched {
        position: relative;
        width: calc(100vw - var(--wd-scroll-w) - var(--wd-sticky-nav-w));
        inset-inline-start: calc(50% - 50vw + var(--wd-scroll-w)/2 + var(--wd-sticky-nav-w)/2)
    }

    .wd-page-title {
        --wd-align: start;
        --wd-title-sp: 15px;
        --wd-title-font-s: 36px;
        position: relative;
        padding-block: var(--wd-title-sp)
    }

    .wd-page-title .container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: var(--wd-align);
        text-align: var(--wd-align);
        gap: 10px
    }

    .wd-page-title .title {
        font-size: var(--wd-title-font-s);
        line-height: 1.2;
        margin-bottom: 0
    }

    .wd-page-title-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover
    }

    .title-design-centered {
        --wd-align: center
    }

    @media(min-width: 1025px) {
        .title-size-small {
            --wd-title-sp: 20px;
            --wd-title-font-s: 44px
        }

        .title-size-default {
            --wd-title-sp: 60px;
            --wd-title-font-s: 68px
        }

        .title-size-large {
            --wd-title-sp: 100px;
            --wd-title-font-s: 78px
        }
    }

    .wd-checkout-steps {
        --wd-link-color: initial;
        --wd-link-color-hover: initial;
        --wd-link-decor: none;
        --wd-link-decor-hover: none;
        --list-mb: 0;
        --li-pl: 0;
        --li-mb: 0;
        display: flex;
        justify-content: var(--wd-align);
        flex-wrap: wrap;
        gap: 10px 15px;
        font-size: 22px;
        text-transform: uppercase;
        color: var(--wd-title-color);
        font-weight: var(--wd-title-font-weight);
        font-style: var(--wd-title-font-style);
        font-family: var(--wd-title-font);
        list-style: none
    }

    .wd-checkout-steps li {
        display: flex;
        align-items: center;
        gap: 15px
    }

    @media(min-width: 769px) {

        .wd-checkout-steps li>:is(a,
            span) {
            opacity: .7
        }

        .wd-checkout-steps li a:hover {
            opacity: 1
        }

        .wd-checkout-steps li:not(:last-child):after {
            font-weight: 400;
            font-size: 85%;
            opacity: .7;
            content: "\f120";
            font-family: "woodmart-font"
        }

        .wd-checkout-steps .step-active>:is(a,
            span) {
            opacity: 1;
            text-decoration: underline 2px solid #3964fe;
            text-underline-offset: 6px
        }
    }

    @media(max-width: 768.98px) {
        .wd-checkout-steps .step-inactive {
            display: none
        }
    }
</style>
@section('content')

    <main id="main-content" class="wd-content-layout content-layout-wrapper container wd-builder-on" role="main">
        <div class="wd-content-area site-content">
            <div class="woocommerce entry-content">
                <link rel="stylesheet" id="elementor-post-2646-css"
                    href={{ asset('/wp-content/uploads/elementor/css/post-2646a965.css') }} type="text/css"
                    media="all">
                <div data-elementor-type="wp-post" data-elementor-id="2646" class="elementor elementor-2646">
                    <div class="wd-negative-gap elementor-element elementor-element-d5c10fc e-flex e-con-boxed e-con e-parent"
                        data-id="d5c10fc" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-ead7b8c wd-page-title-el elementor-widget elementor-widget-wd_page_title"
                                data-id="ead7b8c" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_page_title.default">
                                <div class="elementor-widget-container">
                                    <div class="wd-page-title page-title  page-title-default title-size-small title-design-default wd-section-stretch color-scheme-light"
                                        style="">
                                        <div class="wd-page-title-bg wd-fill">
                                            <img width="1920" height="410"
                                                src="/wp-content/uploads/2026/04/edc-hero-section-bg.jpg"
                                                class="attachment-full size-full" alt="" decoding="async"
                                                fetchpriority="high"
                                                srcset="/wp-content/uploads/2026/04/edc-hero-section-bg.jpg 1920w, /wp-content/uploads/2026/04/edc-hero-section-bg-150x32.jpg 150w, /wp-content/uploads/2026/04/edc-hero-section-bg-1200x256.jpg 1200w"
                                                sizes="(max-width: 1920px) 100vw, 1920px" />
                                        </div>
                                        <div class="container">
                                            <ul class="wd-checkout-steps">
                                                <li class="step-cart step-active">
                                                    <a href="/">
                                                        <span>{{ __('Carrito de compra') }}</span>
                                                    </a>
                                                </li>
                                                <li class="step-checkout step-inactive">
                                                    <a href="../finalizar-compra/index.html">
                                                        <span>{{ __('Finalizar compra') }}</span>
                                                    </a>
                                                </li>
                                                <li class="step-complete step-inactive">
                                                    <span>{{ __('Pedido completado') }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-8d310a5 e-con-full e-flex e-con e-child"
                        data-id="8d310a5" data-element_type="container" data-e-type="container">
                        <div class="elementor-element elementor-element-67f59e9 e-con-full e-flex e-con e-child"
                            data-id="67f59e9" data-element_type="container" data-e-type="container"
                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-element elementor-element-2b3f871 wd-wc-notices elementor-widget elementor-widget-wd_wc_notices"
                                data-id="2b3f871" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_wc_notices.default">
                                <div class="elementor-widget-container">
                                    <div class="woocommerce-notices-wrapper"></div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-b15b650 wd-cart-table elementor-widget elementor-widget-wd_cart_table"
                                data-id="b15b650" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_cart_table.default">
                                <div class="elementor-widget-container">
                                    <p id="js-cart-empty" class="cart-empty" style="display:none;">{{ __('Tu carrito está vacío.') }} <a href="{{ route('shop.index') }}">{{ __('Ver productos') }}</a></p>

                                    <form class="woocommerce-cart-form" action="{{ route('shop.carrito') }}"
                                        method="post" onsubmit="return false;">


                                        <table
                                            class="shop_table shop_table_responsive shop-table-with-img cart woocommerce-cart-form__contents">
                                            <thead>
                                                <tr>
                                                    <th class="product-remove">&nbsp;</th>
                                                    <th class="product-thumbnail">&nbsp;</th>
                                                    <th scope="col" class="product-name">{{ __('Producto') }}</th>
                                                    <th scope="col" class="product-price">{{ __('Precio') }}</th>
                                                    <th scope="col" class="product-quantity">{{ __('Cantidad') }}</th>
                                                    <th scope="col" class="product-subtotal">{{ __('Subtotal') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="js-cart-items">
                                            </tbody>
                                        </table>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-a9be630 e-con-full e-flex e-con e-child"
                            data-id="a9be630" data-element_type="container" data-e-type="container"
                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-element elementor-element-1e822da wd-btn-align-full-width wd-title-show wd-cart-totals elementor-widget elementor-widget-wd_cart_totals"
                                data-id="1e822da" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_cart_totals.default">
                                <div class="elementor-widget-container">
                                    <div class="cart_totals ">

                                        <div class="cart-totals-inner wd-set-mb reset-last-child wd-layout-1">
                                            <h2>{{ __('Totales del carrito') }}</h2>

                                            <table cellspacing="0" class="shop_table shop_table_responsive">

                                                <tr class="cart-subtotal">
                                                    <th>{{ __('Subtotal') }}</th>
                                                    <td data-title="{{ __('Subtotal') }}"><span
                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol"
                                                                    translate="no">&euro;</span><span id="js-cart-subtotal-amount">636.420,44</span></bdi></span>
                                                    </td>
                                                </tr>




                                                <tr class="woocommerce-shipping-totals shipping">
                                                    <th>{{ __('Envío') }}</th>
                                                    <td data-title="{{ __('Envío') }}">
                                                        <ul id="shipping_method" class="woocommerce-shipping-methods">
                                                            <li>
                                                                <input type="hidden" name="shipping_method[0]"
                                                                    data-index="0" id="shipping_method_0_flat_rate1"
                                                                    value="flat_rate:1"
                                                                    class="shipping_method" checked="checked" /><label
                                                                    for="shipping_method_0_flat_rate1">{{ __('Envío Portugal / España') }}: <span id="js-cart-shipping-amount" class="woocommerce-Price-amount amount">{{ number_format((float) config('company.shipping.fee', 400), 2, ',', '.') }}</span>&nbsp;€</label>
                                                            </li>
                                                        </ul>
                                                        <p class="woocommerce-shipping-destination">
                                                            {{ __('Envío disponible en') }} <strong>{{ __('Portugal y España') }}</strong> — {{ number_format((float) config('company.shipping.fee', 400), 0, ',', '.') }} €.</p>



                                                        <form class="woocommerce-shipping-calculator"
                                                            action="{{ route('shop.carrito') }}" method="post" onsubmit="return false;">

                                                            <a href="#" class="shipping-calculator-button"
                                                                aria-expanded="false"
                                                                aria-controls="shipping-calculator-form"
                                                                role="button">{{ __('Cambiar dirección') }}</a>
                                                            <section class="shipping-calculator-form"
                                                                id="shipping-calculator-form" style="display:none;">

                                                                <p class="form-row form-row-wide"
                                                                    id="calc_shipping_country_field">
                                                                    <label for="calc_shipping_country">{{ __('País / Región') }}</label>
                                                                    <select name="calc_shipping_country"
                                                                        id="calc_shipping_country"
                                                                        class="country_to_state country_select"
                                                                        rel="calc_shipping_state">
                                                                        <option value="default">Selecciona un país/región&hellip;</option>
                                                                        <option value="AF">Afganistán</option>
                                                                        <option value="AL">Albania</option>
                                                                        <option value="DE">Alemania</option>
                                                                        <option value="AD">Andorra</option>
                                                                        <option value="AO">Angola</option>
                                                                        <option value="AI">Anguila</option>
                                                                        <option value="AQ">Antártida</option>
                                                                        <option value="AG">Antigua y Barbuda
                                                                        </option>
                                                                        <option value="SA">Arabia Saudita
                                                                        </option>
                                                                        <option value="DZ">Argelia</option>
                                                                        <option value="AR">Argentina</option>
                                                                        <option value="AM">Armenia</option>
                                                                        <option value="AW">Aruba</option>
                                                                        <option value="AU">Australia</option>
                                                                        <option value="AT">Austria</option>
                                                                        <option value="AZ">Azerbaijan</option>
                                                                        <option value="BS">Bahamas</option>
                                                                        <option value="BH">Bahrain</option>
                                                                        <option value="BD">Bangladesh</option>
                                                                        <option value="BB">Barbados</option>
                                                                        <option value="PW">Belau</option>
                                                                        <option value="BE">Bélgica</option>
                                                                        <option value="BZ">Belize</option>
                                                                        <option value="BJ">Benin</option>
                                                                        <option value="BM">Bermuda</option>
                                                                        <option value="BT">Bhutan</option>
                                                                        <option value="BY">Bielorrusia</option>
                                                                        <option value="MM">Birmania</option>
                                                                        <option value="BO">Bolivia</option>
                                                                        <option value="BQ">Bonaire, San Eustaquio y Saba</option>
                                                                        <option value="BA">Bosnia y Herzegovina
                                                                        </option>
                                                                        <option value="BW">Botswana</option>
                                                                        <option value="BR">Brasil</option>
                                                                        <option value="BN">Brunéi</option>
                                                                        <option value="BG">Bulgaria</option>
                                                                        <option value="BF">Burkina Faso</option>
                                                                        <option value="BI">Burundi</option>
                                                                        <option value="CV">Cabo Verde</option>
                                                                        <option value="KH">Camboya</option>
                                                                        <option value="CM">Camerún</option>
                                                                        <option value="CA">Canadá</option>
                                                                        <option value="TD">Chad</option>
                                                                        <option value="CL">Chile</option>
                                                                        <option value="CN">China</option>
                                                                        <option value="CY">Chipre</option>
                                                                        <option value="VA">Ciudad del Vaticano
                                                                        </option>
                                                                        <option value="CO">Colombia</option>
                                                                        <option value="KM">Comoras</option>
                                                                        <option value="CG">Congo (Brazzaville)
                                                                        </option>
                                                                        <option value="CD">Congo (Kinshasa)
                                                                        </option>
                                                                        <option value="KP">Corea del Norte
                                                                        </option>
                                                                        <option value="KR">Corea del Sur
                                                                        </option>
                                                                        <option value="CI">Costa de Marfil
                                                                        </option>
                                                                        <option value="CR">Costa Rica</option>
                                                                        <option value="HR">Croacia</option>
                                                                        <option value="CU">Cuba</option>
                                                                        <option value="CW">Cura&ccedil;ao
                                                                        </option>
                                                                        <option value="DK">Dinamarca</option>
                                                                        <option value="DJ">Djibouti</option>
                                                                        <option value="DM">Dominica</option>
                                                                        <option value="EC">Ecuador</option>
                                                                        <option value="EG">Egipto</option>
                                                                        <option value="SV">El Salvador</option>
                                                                        <option value="AE">Emiratos Árabes Unidos</option>
                                                                        <option value="ER">Eritrea</option>
                                                                        <option value="SK">Eslovaquia</option>
                                                                        <option value="SI">Eslovenia</option>
                                                                        <option value="ES" selected='selected'>
                                                                            {{ __('España') }}</option>
                                                                        <option value="US">Estados Unidos (EEUU)
                                                                        </option>
                                                                        <option value="EE">Estonia</option>
                                                                        <option value="SZ">Esuatini</option>
                                                                        <option value="ET">Etiopía</option>
                                                                        <option value="PH">Filipinas</option>
                                                                        <option value="FI">Finlandia</option>
                                                                        <option value="FJ">Fiyi</option>
                                                                        <option value="FR">Francia</option>
                                                                        <option value="GA">Gabón</option>
                                                                        <option value="GM">Gambia</option>
                                                                        <option value="GE">Georgia</option>
                                                                        <option value="GH">Ghana</option>
                                                                        <option value="GI">Gibraltar</option>
                                                                        <option value="GD">Granada</option>
                                                                        <option value="GR">Grecia</option>
                                                                        <option value="GL">Groenlandia</option>
                                                                        <option value="GP">Guadalupe</option>
                                                                        <option value="GU">Guam</option>
                                                                        <option value="GT">Guatemala</option>
                                                                        <option value="GF">Guayana Francesa
                                                                        </option>
                                                                        <option value="GG">Guernsey</option>
                                                                        <option value="GN">Guinea</option>
                                                                        <option value="GQ">Guinea Ecuatorial
                                                                        </option>
                                                                        <option value="GW">Guinea-Bisáu</option>
                                                                        <option value="GY">Guyana</option>
                                                                        <option value="HT">Haití</option>
                                                                        <option value="HN">Honduras</option>
                                                                        <option value="HK">Hong Kong</option>
                                                                        <option value="HU">Hungría</option>
                                                                        <option value="IN">India</option>
                                                                        <option value="ID">Indonesia</option>
                                                                        <option value="IQ">Irak</option>
                                                                        <option value="IR">Irán</option>
                                                                        <option value="IE">Irlanda</option>
                                                                        <option value="BV">Isla Bouvet</option>
                                                                        <option value="IM">Isla de Man</option>
                                                                        <option value="CX">Isla de Navidad
                                                                        </option>
                                                                        <option value="NF">Isla Norfolk</option>
                                                                        <option value="SH">Isla Santa Elena
                                                                        </option>
                                                                        <option value="IS">Islandia</option>
                                                                        <option value="AX">Islas Åland</option>
                                                                        <option value="KY">Islas Caimán</option>
                                                                        <option value="CC">Islas Cocos</option>
                                                                        <option value="CK">Islas Cook</option>
                                                                        <option value="UM">Islas de ultramar menores de Estados Unidos (EEUU)
                                                                        </option>
                                                                        <option value="FO">Islas Feroe</option>
                                                                        <option value="GS">Islas Georgias y Sandwich del Sur</option>
                                                                        <option value="HM">Islas Heard y McDonald</option>
                                                                        <option value="FK">Islas Malvinas
                                                                        </option>
                                                                        <option value="MP">Islas Marianas del Norte</option>
                                                                        <option value="MH">Islas Marshall
                                                                        </option>
                                                                        <option value="SB">Islas Salomón
                                                                        </option>
                                                                        <option value="TC">Islas Turcas y Caicos
                                                                        </option>
                                                                        <option value="VG">Islas Vírgenes (Británicas)</option>
                                                                        <option value="VI">Islas Vírgenes (EEUU)
                                                                        </option>
                                                                        <option value="IL">Israel</option>
                                                                        <option value="IT">Italia</option>
                                                                        <option value="JM">Jamaica</option>
                                                                        <option value="JP">Japón</option>
                                                                        <option value="JE">Jersey</option>
                                                                        <option value="JO">Jordania</option>
                                                                        <option value="KZ">Kazajistán</option>
                                                                        <option value="KE">Kenia</option>
                                                                        <option value="KG">Kirguistán</option>
                                                                        <option value="KI">Kiribati</option>
                                                                        <option value="XK">Kosovo</option>
                                                                        <option value="KW">Kuwait</option>
                                                                        <option value="LA">Laos</option>
                                                                        <option value="LS">Lesoto</option>
                                                                        <option value="LV">Letonia</option>
                                                                        <option value="LB">Líbano</option>
                                                                        <option value="LR">Liberia</option>
                                                                        <option value="LY">Libia</option>
                                                                        <option value="LI">Liechtenstein
                                                                        </option>
                                                                        <option value="LT">Lituania</option>
                                                                        <option value="LU">Luxemburgo</option>
                                                                        <option value="MO">Macao</option>
                                                                        <option value="MK">Macedonia del Norte
                                                                        </option>
                                                                        <option value="MG">Madagascar</option>
                                                                        <option value="MY">Malasia</option>
                                                                        <option value="MW">Malaui</option>
                                                                        <option value="MV">Maldivas</option>
                                                                        <option value="ML">Malí</option>
                                                                        <option value="MT">Malta</option>
                                                                        <option value="MA">Marruecos</option>
                                                                        <option value="MQ">Martinica</option>
                                                                        <option value="MU">Mauricio</option>
                                                                        <option value="MR">Mauritania</option>
                                                                        <option value="YT">Mayotte</option>
                                                                        <option value="MX">México</option>
                                                                        <option value="FM">Micronesia</option>
                                                                        <option value="MD">Moldavia</option>
                                                                        <option value="MC">Mónaco</option>
                                                                        <option value="MN">Mongolia</option>
                                                                        <option value="ME">Montenegro</option>
                                                                        <option value="MS">Montserrat</option>
                                                                        <option value="MZ">Mozambique</option>
                                                                        <option value="NA">Namibia</option>
                                                                        <option value="NR">Nauru</option>
                                                                        <option value="NP">Nepal</option>
                                                                        <option value="NI">Nicaragua</option>
                                                                        <option value="NE">Níger</option>
                                                                        <option value="NG">Nigeria</option>
                                                                        <option value="NU">Niue</option>
                                                                        <option value="NO">Noruega</option>
                                                                        <option value="NC">Nueva Caledonia
                                                                        </option>
                                                                        <option value="NZ">Nueva Zelanda
                                                                        </option>
                                                                        <option value="OM">Omán</option>
                                                                        <option value="NL">Países Bajos</option>
                                                                        <option value="PK">Pakistán</option>
                                                                        <option value="PA">Panamá</option>
                                                                        <option value="PG">Papúa Nueva Guinea
                                                                        </option>
                                                                        <option value="PY">Paraguay</option>
                                                                        <option value="PE">Perú</option>
                                                                        <option value="PN">Pitcairn</option>
                                                                        <option value="PF">Polinesia Francesa
                                                                        </option>
                                                                        <option value="PL">Polonia</option>
                                                                        <option value="PT">Portugal</option>
                                                                        <option value="PR">Puerto Rico</option>
                                                                        <option value="QA">Qatar</option>
                                                                        <option value="GB">Reino Unido (UK)
                                                                        </option>
                                                                        <option value="CF">República Centroafricana</option>
                                                                        <option value="CZ">República Checa
                                                                        </option>
                                                                        <option value="DO">República Dominicana
                                                                        </option>
                                                                        <option value="RE">Reunión</option>
                                                                        <option value="RW">Ruanda</option>
                                                                        <option value="RO">Rumania</option>
                                                                        <option value="RU">Rusia</option>
                                                                        <option value="EH">Sahara Occidental
                                                                        </option>
                                                                        <option value="WS">Samoa</option>
                                                                        <option value="AS">Samoa Americana
                                                                        </option>
                                                                        <option value="BL">San Bartolomé
                                                                        </option>
                                                                        <option value="KN">San Cristóbal y Nieves</option>
                                                                        <option value="SM">San Marino</option>
                                                                        <option value="SX">San Martín (Países Bajos)</option>
                                                                        <option value="MF">San Martín (parte de Francia)</option>
                                                                        <option value="PM">San Pedro y Miquelón
                                                                        </option>
                                                                        <option value="VC">San Vicente y las Granadinas</option>
                                                                        <option value="LC">Santa Lucía</option>
                                                                        <option value="ST">Santo Tomé y Príncipe
                                                                        </option>
                                                                        <option value="SN">Senegal</option>
                                                                        <option value="RS">Serbia</option>
                                                                        <option value="SC">Seychelles</option>
                                                                        <option value="SL">Sierra Leona</option>
                                                                        <option value="SG">Singapur</option>
                                                                        <option value="SY">Siria</option>
                                                                        <option value="SO">Somalia</option>
                                                                        <option value="LK">Sri Lanka</option>
                                                                        <option value="ZA">Sudáfrica</option>
                                                                        <option value="SD">Sudán</option>
                                                                        <option value="SS">Sudán del Sur
                                                                        </option>
                                                                        <option value="SE">Suecia</option>
                                                                        <option value="CH">Suiza</option>
                                                                        <option value="SR">Surinam</option>
                                                                        <option value="SJ">Svalbard y Jan Mayen
                                                                        </option>
                                                                        <option value="TH">Tailandia</option>
                                                                        <option value="TW">Taiwán</option>
                                                                        <option value="TZ">Tanzania</option>
                                                                        <option value="TJ">Tayikistán</option>
                                                                        <option value="IO">Territorio Británico del Océano Índico</option>
                                                                        <option value="TF">Territorios australes franceses</option>
                                                                        <option value="PS">Territorios Palestinos</option>
                                                                        <option value="TL">Timor Oriental
                                                                        </option>
                                                                        <option value="TG">Togo</option>
                                                                        <option value="TK">Tokelau</option>
                                                                        <option value="TO">Tonga</option>
                                                                        <option value="TT">Trinidad y Tobago
                                                                        </option>
                                                                        <option value="TN">Túnez</option>
                                                                        <option value="TM">Turkmenistán</option>
                                                                        <option value="TR">Turquía</option>
                                                                        <option value="TV">Tuvalu</option>
                                                                        <option value="UA">Ucrania</option>
                                                                        <option value="UG">Uganda</option>
                                                                        <option value="UY">Uruguay</option>
                                                                        <option value="UZ">Uzbekistán</option>
                                                                        <option value="VU">Vanuatu</option>
                                                                        <option value="VE">Venezuela</option>
                                                                        <option value="VN">Vietnam</option>
                                                                        <option value="WF">Wallis y Futuna
                                                                        </option>
                                                                        <option value="YE">Yemen</option>
                                                                        <option value="ZM">Zambia</option>
                                                                        <option value="ZW">Zimbabue</option>
                                                                    </select>
                                                                </p>

                                                                <p class="form-row form-row-wide"
                                                                    id="calc_shipping_state_field">
                                                                    <span>
                                                                        <label for="calc_shipping_state">{{ __('Región / Provincia') }}</label>
                                                                        <select name="calc_shipping_state"
                                                                            class="state_select" id="calc_shipping_state">
                                                                            <option value="">Elige una opción&hellip;</option>
                                                                            <option value="C">La Coruña</option>
                                                                            <option value="VI">Álava</option>
                                                                            <option value="AB">Albacete</option>
                                                                            <option value="A">Alicante</option>
                                                                            <option value="AL">Almería</option>
                                                                            <option value="O">Asturias</option>
                                                                            <option value="AV">Ávila</option>
                                                                            <option value="BA">Badajoz</option>
                                                                            <option value="PM">Baleares</option>
                                                                            <option value="B" selected='selected'>
                                                                                {{ __('Barcelona') }}
                                                                            </option>
                                                                            <option value="BU">Burgos</option>
                                                                            <option value="CC">Cáceres</option>
                                                                            <option value="CA">Cádiz</option>
                                                                            <option value="S">Cantabria</option>
                                                                            <option value="CS">Castellón
                                                                            </option>
                                                                            <option value="CE">Ceuta</option>
                                                                            <option value="CR">Ciudad Real
                                                                            </option>
                                                                            <option value="CO">Córdoba</option>
                                                                            <option value="CU">Cuenca</option>
                                                                            <option value="GI">Gerona</option>
                                                                            <option value="GR">Granada</option>
                                                                            <option value="GU">Guadalajara
                                                                            </option>
                                                                            <option value="SS">Guipúzcoa
                                                                            </option>
                                                                            <option value="H">Huelva</option>
                                                                            <option value="HU">Huesca</option>
                                                                            <option value="J">Jaén</option>
                                                                            <option value="LO">La Rioja</option>
                                                                            <option value="GC">Las Palmas
                                                                            </option>
                                                                            <option value="LE">León</option>
                                                                            <option value="L">Lérida</option>
                                                                            <option value="LU">Lugo</option>
                                                                            <option value="M">Madrid</option>
                                                                            <option value="MA">Málaga</option>
                                                                            <option value="ML">Melilla</option>
                                                                            <option value="MU">Murcia</option>
                                                                            <option value="NA">Navarra</option>
                                                                            <option value="OR">Orense</option>
                                                                            <option value="P">Palencia</option>
                                                                            <option value="PO">Pontevedra
                                                                            </option>
                                                                            <option value="SA">Salamanca
                                                                            </option>
                                                                            <option value="TF">Santa Cruz de Tenerife</option>
                                                                            <option value="SG">Segovia</option>
                                                                            <option value="SE">Sevilla</option>
                                                                            <option value="SO">Soria</option>
                                                                            <option value="T">Tarragona</option>
                                                                            <option value="TE">Teruel</option>
                                                                            <option value="TO">Toledo</option>
                                                                            <option value="V">Valencia</option>
                                                                            <option value="VA">Valladolid
                                                                            </option>
                                                                            <option value="BI">Vizcaya</option>
                                                                            <option value="ZA">Zamora</option>
                                                                            <option value="Z">Zaragoza</option>
                                                                        </select>
                                                                    </span>
                                                                </p>

                                                                <p class="form-row form-row-wide"
                                                                    id="calc_shipping_city_field">
                                                                    <label for="calc_shipping_city">{{ __('Ciudad:') }}</label>
                                                                    <input type="text" class="input-text"
                                                                        value="" name="calc_shipping_city"
                                                                        id="calc_shipping_city" />
                                                                </p>

                                                                <p class="form-row form-row-wide"
                                                                    id="calc_shipping_postcode_field">
                                                                    <label for="calc_shipping_postcode">{{ __('Código postal:') }}</label>
                                                                    <input type="text" class="input-text"
                                                                        value="" name="calc_shipping_postcode"
                                                                        id="calc_shipping_postcode" />
                                                                </p>

                                                                <p><button type="submit" name="calc_shipping"
                                                                        value="1" class="button">{{ __('Actualizar') }}</button>
                                                                </p>
                                                                <input type="hidden"
                                                                    id="woocommerce-shipping-calculator-nonce"
                                                                    name="woocommerce-shipping-calculator-nonce"
                                                                    value="3f5fc3d284" /><input type="hidden"
                                                                    name="_wp_http_referer" value="/carrito/" />
                                                            </section>
                                                        </form>

                                                    </td>
                                                </tr>






                                                <tr class="order-total">
                                                    <th>{{ __('Total') }}</th>
                                                    <td data-title="{{ __('Total') }}"><strong><span
                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                        class="woocommerce-Price-currencySymbol"
                                                                        translate="no">&euro;</span><span id="js-cart-total-amount">636.420,44</span></bdi></span></strong>
                                                    </td>
                                                </tr>


                                            </table>

                                            <div class="wc-proceed-to-checkout">

                                                <a href="{{ route('shop.checkout') }}" id="js-checkout-button"
                                                    class="checkout-button button alt wc-forward">
                                                    {{ __('Finalizar compra') }}</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wd-negative-gap elementor-element elementor-element-76b4abf e-flex e-con-boxed e-con e-parent"
                        data-id="76b4abf" data-element_type="container" data-e-type="container">
                        <div class="e-con-inner">
                            <div class="elementor-element elementor-element-855aa62 wd-width-100 elementor-widget elementor-widget-wd_title"
                                data-id="855aa62" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_title.default">
                                <div class="elementor-widget-container">
                                    <div
                                        class="title-wrapper wd-set-mb reset-last-child wd-title-color-primary wd-title-style-default wd-title-size-default text-center">


                                        <div class="liner-continer">
                                            <h4 class="woodmart-title-container title wd-fontsize-l">{{ __('You May Be Interested In…') }}</h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-830df00 wd-width-100 elementor-widget elementor-widget-wd_products"
                                data-id="830df00" data-element_type="widget" data-e-type="widget"
                                data-widget_type="wd_products.default">
                                <div class="elementor-widget-container">
                                    <style id="wd-style-blocks-117-inline-css" data-type="wd-style-blocks-117">
                                        .wd.wd .wd-947bcea5 {
                                            --wd-line-count: 1;
                                        }

                                        .wd.wd .wd-34a257bd {
                                            pointer-events: auto;
                                        }

                                        .wd.wd .wd-2d36d2a1 :is(.price, del) {
                                            color: #242424;
                                        }

                                        .wd.wd .wd-2d36d2a1 .price del {
                                            color: #9e9e9e;
                                        }

                                        .wd.wd .wd-b02becae {
                                            align-items: center;
                                            align-content: center;
                                            flex-wrap: wrap;
                                            --wd-col-gap: 5px;
                                            min-height: 25px;
                                        }

                                        .wd.wd .wd-06832d7b {
                                            justify-content: space-between;
                                            padding: 25px;
                                            top: 0px;
                                            right: 0px;
                                            bottom: 0px;
                                            left: 0px;
                                            pointer-events: none;
                                        }

                                        @media (max-width: 1024px) {
                                            .wd.wd .wd-06832d7b {
                                                padding: 15px;
                                            }
                                        }
                                    </style>

                                    <div id="carousel-935"
                                        class="wd-carousel-container  wd-products-element wd-products products wd-loop-builder-on wd-loop-item-wrap-117">


                                        <div class="wd-carousel-inner">
                                            <div class=" wd-carousel wd-grid" data-scroll_per_page="yes"
                                                style="--wd-col-lg:4;--wd-col-md:3;--wd-col-sm:2;--wd-gap-lg:20px;--wd-gap-sm:10px;">
                                                <div class="wd-carousel-wrap">
                                                    @foreach ($suggestedProducts as $product)
                                                    <div class="wd-carousel-item">
                                                        @include('partials.product-card', ['product' => $product])
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="wd-nav-arrows wd-pos-sep wd-hover-1 wd-icon-1">
                                                <div class="wd-btn-arrow wd-prev">
                                                    <div class="wd-arrow-inner"></div>
                                                </div>
                                                <div class="wd-btn-arrow wd-next">
                                                    <div class="wd-arrow-inner"></div>
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

@push('scripts')
<script>
    (function () {
        function escapeHtml(value) {
            var div = document.createElement('div');
            div.textContent = value == null ? '' : String(value);
            return div.innerHTML;
        }

        function cartRowHtml(item) {
            var lineSubtotal = Shop.formatPrice(item.price * item.qty);
            var unitPrice = Shop.formatPrice(item.price);
            var labels = window.mmCartLabels || { price: 'Precio', quantity: 'Cantidad', subtotal: 'Subtotal' };

            return (
                '<tr class="woocommerce-cart-form__cart-item cart_item">' +
                '<td class="product-remove">' +
                '<a role="button" href="#" class="remove" aria-label="Eliminar ' + escapeHtml(item.name) + ' del carrito" data-product_id="' + item.id + '" data-product_sku="' + escapeHtml(item.sku) + '">&times;</a>' +
                '</td>' +
                '<td class="product-thumbnail">' +
                '<a href="' + escapeHtml(item.slug) + '">' +
                (item.image ? '<img width="600" height="600" src="' + escapeHtml(item.image) + '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="' + escapeHtml(item.name) + '">' : '') +
                '</a>' +
                '</td>' +
                '<td class="product-name" data-title="Producto">' +
                '<a href="' + escapeHtml(item.slug) + '">' + escapeHtml(item.name) + '</a>' +
                Shop.deliveryEstimateHtml('pellets-delivery-cart') +
                '</td>' +
                '<td class="product-price" data-title="' + escapeHtml(labels.price) + '">' +
                '<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">&euro;</span>' + unitPrice + '</bdi></span>' +
                '</td>' +
                '<td class="product-quantity" data-title="' + escapeHtml(labels.quantity) + '">' +
                '<div class="quantity">' +
                '<input type="button" value="-" class="minus btn" aria-label="Disminuir cantidad" data-product_id="' + item.id + '" />' +
                '<label class="screen-reader-text" for="quantity_' + item.id + '">' + escapeHtml(item.name) + ' cantidad</label>' +
                '<input type="number" id="quantity_' + item.id + '" class="input-text qty text" value="' + item.qty + '" aria-label="Cantidad de productos" min="0" step="1" placeholder="" inputmode="numeric" autocomplete="off" data-product_id="' + item.id + '">' +
                '<input type="button" value="+" class="plus btn" aria-label="Aumentar cantidad" data-product_id="' + item.id + '" />' +
                '</div>' +
                '</td>' +
                '<td class="product-subtotal" data-title="' + escapeHtml(labels.subtotal) + '">' +
                '<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol" translate="no">&euro;</span>' + lineSubtotal + '</bdi></span>' +
                '</td>' +
                '</tr>'
            );
        }

        function renderCart() {
            var items = Shop.readCart();
            var emptyMessage = document.getElementById('js-cart-empty');
            var form = document.querySelector('.woocommerce-cart-form');
            var totalsWidget = document.querySelector('.elementor-widget-wd_cart_totals');
            var itemsBody = document.getElementById('js-cart-items');
            var checkoutButton = document.getElementById('js-checkout-button');

            if (!itemsBody) {
                return;
            }

            if (!items.length) {
                if (emptyMessage) {
                    emptyMessage.style.display = '';
                }
                if (form) {
                    form.style.display = 'none';
                }
                if (totalsWidget) {
                    totalsWidget.style.display = 'none';
                }
                itemsBody.innerHTML = '';
                return;
            }

            if (emptyMessage) {
                emptyMessage.style.display = 'none';
            }
            if (form) {
                form.style.display = '';
            }
            if (totalsWidget) {
                totalsWidget.style.display = '';
            }

            itemsBody.innerHTML = items.map(cartRowHtml).join('');

            var totals = Shop.totals(items);
            var subtotalEl = document.getElementById('js-cart-subtotal-amount');
            var shippingEl = document.getElementById('js-cart-shipping-amount');
            var totalEl = document.getElementById('js-cart-total-amount');

            if (subtotalEl) {
                subtotalEl.textContent = Shop.formatPrice(totals.subtotal);
            }
            if (shippingEl) {
                shippingEl.textContent = Shop.formatPrice(totals.shipping);
            }
            if (totalEl) {
                totalEl.textContent = Shop.formatPrice(totals.total);
            }

            if (checkoutButton) {
                checkoutButton.style.pointerEvents = '';
                checkoutButton.style.opacity = '';
            }
        }

        document.addEventListener('click', function (e) {
            var removeLink = e.target.closest('#js-cart-items .remove');
            if (removeLink) {
                e.preventDefault();
                var removeId = parseInt(removeLink.getAttribute('data-product_id'), 10);
                Shop.removeFromCart(removeId);
                return;
            }

            var qtyBtn = e.target.closest('#js-cart-items .minus, #js-cart-items .plus');
            if (qtyBtn) {
                e.preventDefault();
                var id = parseInt(qtyBtn.getAttribute('data-product_id'), 10);
                var row = qtyBtn.closest('tr');
                var qtyInput = row ? row.querySelector('input.qty') : null;
                if (!qtyInput) {
                    return;
                }
                var current = parseInt(qtyInput.value, 10) || 1;
                var next = qtyBtn.classList.contains('plus') ? current + 1 : current - 1;

                if (next < 1) {
                    Shop.removeFromCart(id);
                } else {
                    Shop.updateQuantity(id, next);
                }
                return;
            }
        });

        document.addEventListener('change', function (e) {
            var qtyInput = e.target.closest('#js-cart-items input.qty');
            if (!qtyInput) {
                return;
            }
            var id = parseInt(qtyInput.getAttribute('data-product_id'), 10);
            var qty = parseInt(qtyInput.value, 10) || 0;
            Shop.updateQuantity(id, qty);
        });

        document.addEventListener('DOMContentLoaded', renderCart);
        document.addEventListener('cart:updated', renderCart);
    })();
</script>
@endpush

@endsection
