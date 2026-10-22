@extends('layouts.app')

@section('title', 'Mi cuenta | '.config('app.name'))
@section('body_class', 'woocommerce-account page')

@section('content')

<div class="wd-page-content main-page-wrapper">

    <div class="wd-page-title page-title page-title-default title-size-small title-design-default color-scheme-light">
        <div class="wd-page-title-bg wd-fill">
            <img width="1920" height="410" src="{{ asset('wp-content/uploads/2026/04/edc-hero-section-bg.jpg') }}"
                class="attachment-full size-full" alt="" decoding="async" fetchpriority="high" />
        </div>
        <div class="container">
            <h1 class="entry-title title">{{ __('Mi cuenta') }}</h1>
            <nav class="wd-breadcrumbs"><a href="{{ route('home') }}">{{ __('Inicio') }}</a><span class="wd-delimiter">•</span><span class="wd-last">{{ __('Mi cuenta') }}</span></nav>
        </div>
    </div>

    <main id="main-content" class="wd-content-layout content-layout-wrapper container wd-builder-off" role="main">
        <div class="wd-content-area site-content">
            <article class="entry-content page type-page status-publish hentry">
                <div class="woocommerce">
                    <div class="woocommerce-notices-wrapper">
                        @if (session('status'))
                            <p class="woocommerce-message">{{ session('status') }}</p>
                        @endif
                    </div>

                    <div class="woocommerce-MyAccount-content" style="max-width:900px;">
                        <p>{{ __('Hola') }} <strong>{{ auth()->user()->name }}</strong> — <a href="#" onclick="event.preventDefault(); document.getElementById('mm-logout-form').submit();">{{ __('Cerrar sesión') }}</a></p>

                        <h2 class="wd-login-title" style="margin-top:30px;">{{ __('Mis pedidos') }}</h2>

                        @if ($orders->isEmpty())
                            <p>{{ __('Todavía no has realizado ningún pedido.') }}</p>
                            <p><a href="{{ route('shop.index') }}" class="button">{{ __('Ir a la tienda') }}</a></p>
                        @else
                            <table class="shop_table shop_table_responsive my_account_orders woocommerce-orders-table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Pedido') }}</th>
                                        <th>{{ __('Fecha') }}</th>
                                        <th>{{ __('Estado') }}</th>
                                        <th>{{ __('Total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td data-title="{{ __('Pedido') }}">{{ $order->order_number }}</td>
                                            <td data-title="{{ __('Fecha') }}">{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td data-title="{{ __('Estado') }}">{{ ucfirst($order->status) }}</td>
                                            <td data-title="{{ __('Total') }}">
                                                <span class="woocommerce-Price-amount amount">{{ number_format((float) $order->total, 2, ',', '.') }} &euro;</span>
                                                &middot; {{ $order->items->count() }} artículo(s)
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        <form id="mm-logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </article>
        </div>
    </main>
</div>
@endsection
