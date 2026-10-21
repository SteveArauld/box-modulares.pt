@extends('layouts.app')

@section('title', 'Mi cuenta | '.config('app.name'))

<style>
    .wd-registration-page {
        margin-inline: auto;
        max-width: 1000px
    }

    .wd-registration-page.wd-no-registration {
        max-width: 450px
    }

    #customer_login {
        --wd-col-lg: 2;
        --wd-col-sm: 1;
        --wd-gap-lg: 80px;
        --wd-gap-md: 40px;
        --wd-gap-sm: 30px
    }

    .col-register-text {
        text-align: center
    }

    .registration-info,
    .login-info {
        margin-bottom: 20px
    }

    .wd-register-tabs :is(.col-register,
        .col-login) {
        animation: wd-fadeIn .7s ease
    }

    .wd-register-tabs .col-register {
        display: none
    }

    .active-register .col-register {
        display: block
    }

    .active-register .col-login {
        display: none
    }

    .with-login-reg-info :is(.registration-info,
        .login-info) {
        animation: wd-fadeIn .7s ease
    }

    .with-login-reg-info .login-info {
        display: none
    }

    .with-login-reg-info.active-register .registration-info {
        display: none
    }

    .with-login-reg-info.active-register .login-info {
        display: block
    }

    @media(min-width: 769px) {
        #customer_login>div:not(:first-child):last-child {
            border-inline-start: 1px solid var(--brdcolor-gray-300)
        }

        .col-register-text .wd-login-divider {
            display: none
        }
    }

    /*# sourceURL=/wp-content/themes/woodmart/css/parts/woo-page-login-register-predefined.css */
</style>

@section('content')

<div class="wd-page-content main-page-wrapper">

    <link rel="stylesheet" id="wd-page-title-css"
        href={{ asset('/wp-content/themes/woodmart/css/parts/page-title8833.css') }} type="text/css"
        media="all" />
    <div class="wd-page-title page-title  page-title-default title-size-small title-design-default color-scheme-light"
        style="">
        <div class="wd-page-title-bg wd-fill">
            <img width="1920" height="410" src="/wp-content/uploads/2026/04/edc-hero-section-bg.jpg"
                class="attachment-full size-full" alt="" decoding="async" fetchpriority="high" />
        </div>
        <div class="container">
            <h1 class="entry-title title">
                {{ __('Mi cuenta') }} </h1>


            <nav class="wd-breadcrumbs"><a href="../">{{ __('Inicio') }}</a><span
                    class="wd-delimiter">•</span><span class="wd-last">{{ __('Mi cuenta') }}</span></nav>
        </div>
    </div>

    <main id="main-content" class="wd-content-layout content-layout-wrapper container wd-builder-off"
        role="main">


        <div class="wd-content-area site-content">
            <article id="post-11" class="entry-content post-11 page type-page status-publish hentry">
                <div class="woocommerce">
                    <link rel="stylesheet" id="wd-woo-mod-login-form-css"
                        href={{ asset('/wp-content/themes/woodmart/css/parts/woo-mod-login-form8833.css') }}
                        type="text/css" media="all" />
                    <div class="woocommerce-notices-wrapper">
                        @if (session('status'))
                            <p class="woocommerce-message">{{ session('status') }}</p>
                        @endif
                    </div>
                    <div class="wd-registration-page wd-register-tabs">


                        <div class="wd-grid-f-col" id="customer_login">

                            <div class="wd-col col-login">


                                <h2 class="wd-login-title">{{ __('Acceder') }}</h2>

                                <form method="post" class="login woocommerce-form woocommerce-form-login"
                                    action="{{ route('login') }}">
                                    @csrf
                                    @error('login')
                                        <p class="woocommerce-error">{{ $message }}</p>
                                    @enderror

                                    <p
                                        class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
                                        <label for="username">{{ __('Nombre de usuario o correo electrónico&nbsp;') }}<span
                                                class="required" aria-hidden="true">*</span><span
                                                class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
                                        <input type="email"
                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                            name="email" id="username" autocomplete="username" value="{{ old('email') }}" />
                                    </p>
                                    <p
                                        class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-password">
                                        <label for="password">{{ __('Contraseña&nbsp;') }}<span class="required"
                                                aria-hidden="true">*</span><span
                                                class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text"
                                            type="password" name="password" id="password"
                                            autocomplete="current-password" />
                                    </p>


                                    <p class="form-row form-row-btn">
                                        <button
                                            type="submit"
                                            class="button btn btn-accent woocommerce-button woocommerce-form-login__submit"
                                            name="login" value="Iniciar sesión">{{ __('Iniciar sesión') }}</button>
                                    </p>

                                    <p class="login-form-footer">
                                        <a href="{{ route('shop.lost-password') }}"
                                            class="woocommerce-LostPassword lost_password">{{ __('¿Ha olvidado su contraseña?') }}</a>
                                        <label
                                            class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                            <input
                                                class="woocommerce-form__input woocommerce-form__input-checkbox"
                                                name="remember" type="checkbox" value="1"
                                                title="{{ __('Recordarme') }}" aria-label="{{ __('Recordarme') }}" />
                                            <span>{{ __('Recordarme') }}</span>
                                        </label>
                                    </p>


                                </form>



                            </div>

                            <div class="wd-col col-register">

                                <h2 class="wd-login-title">{{ __('Registrarse') }}</h2>

                                <form method="post" action="{{ route('register') }}"
                                    class="woocommerce-form woocommerce-form-register register">
                                    @csrf

                                    <p
                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="reg_name">{{ __('Nombre completo&nbsp;') }}<span
                                                class="required" aria-hidden="true">*</span><span
                                                class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
                                        <input type="text"
                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                            name="name" id="reg_name" autocomplete="name" value="{{ old('name') }}" />
                                        @error('name')<span class="woocommerce-error" style="display:block;color:#c0392b;font-size:12px;">{{ $message }}</span>@enderror
                                    </p>

                                    <p
                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="reg_email">{{ __('Dirección de correo electrónico&nbsp;') }}<span
                                                class="required" aria-hidden="true">*</span><span
                                                class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
                                        <input type="email"
                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                            name="email" id="reg_email" autocomplete="email" value="{{ old('email') }}" />
                                        @error('email')<span class="woocommerce-error" style="display:block;color:#c0392b;font-size:12px;">{{ $message }}</span>@enderror
                                    </p>

                                    <p
                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="reg_password">{{ __('Contraseña&nbsp;') }}<span
                                                class="required" aria-hidden="true">*</span><span
                                                class="screen-reader-text">{{ __('Obligatorio') }}</span></label>
                                        <input type="password"
                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                            name="password" id="reg_password" autocomplete="new-password" />
                                        @error('password')<span class="woocommerce-error" style="display:block;color:#c0392b;font-size:12px;">{{ $message }}</span>@enderror
                                    </p>


                                    <div style="left: -999em; position: absolute;"><label
                                            for="trap">{{ __('Anti-spam') }}</label><input type="text" name="email_2"
                                            id="trap" tabindex="-1" /></div>

                                    <div class="woocommerce-privacy-policy-text"></div>
                                    <p class="woocommerce-form-row form-row form-row-btn">
                                        <button
                                            type="submit"
                                            class="woocommerce-Button woocommerce-button btn btn-accent button"
                                            name="register" value="Registrarse">{{ __('Registrarse') }}</button>
                                    </p>


                                </form>

                            </div>

                            <div class="wd-col col-register-text">

                                <p class="title wd-login-divider"><span>{{ __('O') }}</span></p>


                                <h2 class="wd-login-title">{{ __('Register') }}</h2>


                                <div class="registration-info">{{ __('Registering for this site allows you to access your order status and history. Just fill in the fields below, and we\'ll get a new account set up for you in no time. We will only ask you for information necessary to make the purchase process faster and easier.') }}</div>


                                <a href="#" rel="nofollow noopener"
                                    class="btn btn-default wd-switch-to-register" data-login="Acceder"
                                    data-login-title="{{ __('Login') }}" data-reg-title="{{ __('Register') }}"
                                    data-register="Registrarse">{{ __('Registrarse') }}</a>

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

</div>

@push('scripts')
<script>
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.wd-switch-to-register');
        if (!btn) {
            return;
        }
        e.preventDefault();
        var container = document.getElementById('customer_login');
        var toRegister = !container.classList.contains('active-register');
        container.classList.toggle('active-register');
        btn.textContent = toRegister ? btn.getAttribute('data-login') : btn.getAttribute('data-register');
    });
</script>
@endpush

@endsection