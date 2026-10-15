@extends('layouts.app')

@section('title', "Pedido recibido #{$order->order_number} | ".config('app.name'))
@section('body_class', 'woocommerce-order-received page')

@section('content')
    <div class="wd-page-content main-page-wrapper">
        <main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">
            <div class="wd-content-area site-content">
                <article class="entry-content page type-page status-publish hentry">
                    <div class="woocommerce">
                        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
                            {{ __('¡Gracias! Tu pedido ha sido recibido correctamente.') }}
                        </p>

                        <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                            <li class="woocommerce-order-overview__order order">
                                {{ __('Número de pedido:') }} <strong>{{ $order->order_number }}</strong>
                            </li>
                            <li class="woocommerce-order-overview__date date">
                                {{ __('Fecha:') }} <strong>{{ $order->created_at->format('d/m/Y') }}</strong>
                            </li>
                            <li class="woocommerce-order-overview__email email">
                                {{ __('Correo electrónico:') }} <strong>{{ $order->billing_email }}</strong>
                            </li>
                            <li class="woocommerce-order-overview__total total">
                                {{ __('Total:') }} <strong>{{ number_format((float) $order->total, 2, ',', '.') }} &euro;</strong>
                            </li>
                            <li class="woocommerce-order-overview__payment-method method">
                                {{ __('Método de pago:') }} <strong>{{ __('Transferencia bancaria directa') }}</strong>
                            </li>
                        </ul>

                        <h2>{{ __('Detalles del pedido') }}</h2>
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                                <tr>
                                    <th class="product-name">{{ __('Producto') }}</th>
                                    <th class="product-total">{{ __('Subtotal') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr class="cart_item">
                                        <td class="product-name" data-title="{{ __('Producto') }}">
                                            {{ $item->product_name }} <strong class="product-quantity">&times; {{ $item->quantity }}</strong>
                                        </td>
                                        <td class="product-total" data-title="{{ __('Subtotal') }}">
                                            <span class="woocommerce-Price-amount amount">{{ number_format((float) $item->line_total, 2, ',', '.') }} &euro;</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('Subtotal') }}</th>
                                    <td><span class="woocommerce-Price-amount amount">{{ number_format((float) $order->subtotal, 2, ',', '.') }} &euro;</span></td>
                                </tr>
                                <tr>
                                    <th>{{ __('Envío') }}</th>
                                    <td>{{ (float) $order->shipping_total > 0 ? number_format((float) $order->shipping_total, 2, ',', '.').' €' : 'Envío gratuito' }}</td>
                                </tr>
                                <tr class="order-total">
                                    <th>{{ __('Total') }}</th>
                                    <td><strong><span class="woocommerce-Price-amount amount">{{ number_format((float) $order->total, 2, ',', '.') }} &euro;</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>

                        <p style="margin-top:24px;">
                            <a href="{{ route('shop.index') }}" class="button">{{ __('Seguir comprando') }}</a>
                        </p>
                    </div>
                </article>
            </div>
        </main>
    </div>
@endsection
