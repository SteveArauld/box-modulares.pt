@extends('layouts.app')

@section('title', 'Restablecer contraseña | '.config('app.name'))
@section('body_class', 'woocommerce-account page')

@section('content')

<div class="wd-page-content main-page-wrapper">

    <div class="wd-page-title page-title page-title-default title-size-small title-design-default color-scheme-light">
        <div class="wd-page-title-bg wd-fill">
            <img width="1920" height="410" src="{{ asset('wp-content/uploads/2026/04/edc-hero-section-bg.jpg') }}"
                class="attachment-full size-full" alt="" decoding="async" fetchpriority="high" />
        </div>
        <div class="container">
            <h1 class="entry-title title">{{ __('Restablecer contraseña') }}</h1>
            <nav class="wd-breadcrumbs"><a href="{{ route('home') }}">{{ __('Inicio') }}</a><span class="wd-delimiter">•</span><span class="wd-last">{{ __('Mi cuenta') }}</span></nav>
        </div>
    </div>

    <main id="main-content" class="wd-content-layout content-layout-wrapper container wd-builder-off" role="main">
        <div class="wd-content-area site-content">
            <article class="entry-content page type-page status-publish hentry">
                <div class="woocommerce" style="max-width:470px;margin-inline:auto;">
                    <div class="woocommerce-notices-wrapper">
                        @error('email')
                            <p class="woocommerce-error">{{ $message }}</p>
                        @enderror
                        @error('password')
                            <p class="woocommerce-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <form method="post" action="{{ route('password.reset.update') }}" class="woocommerce-ResetPassword lost_reset_password">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <p class="woocommerce-form-row form-row form-row-wide">
                            <label for="email">{{ __('Correo electrónico&nbsp;') }}<span class="required" aria-hidden="true">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="email"
                                name="email" id="email" value="{{ old('email', $email) }}" required autocomplete="email" />
                        </p>

                        <p class="woocommerce-form-row form-row form-row-wide">
                            <label for="password">{{ __('Nueva contraseña&nbsp;') }}<span class="required" aria-hidden="true">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                name="password" id="password" required autocomplete="new-password" />
                        </p>

                        <p class="woocommerce-form-row form-row form-row-wide">
                            <label for="password_confirmation">{{ __('Confirmar contraseña&nbsp;') }}<span class="required" aria-hidden="true">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                name="password_confirmation" id="password_confirmation" required autocomplete="new-password" />
                        </p>

                        <div class="clear"></div>

                        <p class="woocommerce-form-row form-row">
                            <button type="submit" class="woocommerce-Button button">{{ __('Restablecer contraseña') }}</button>
                        </p>
                    </form>
                </div>
            </article>
        </div>
    </main>
</div>
@endsection
