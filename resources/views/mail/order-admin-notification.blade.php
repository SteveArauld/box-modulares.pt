<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Nuevo pedido') }}</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background:#f7f7f7; margin:0; padding:24px; color:#242424;">
    <div style="max-width:600px; margin:0 auto; background:#ffffff; border-radius:8px; overflow:hidden; border:1px solid #eee;">
        <div style="background:#b5542e; padding:20px 24px;">
            <h1 style="color:#fff; font-size:20px; margin:0;">{{ __('Nuevo pedido recibido') }}</h1>
        </div>
        <div style="padding:24px;">
            <p style="margin:4px 0;"><strong>{{ __('Número de pedido:') }}</strong> {{ $order->order_number }}</p>
            <p style="margin:4px 0;"><strong>{{ __('Fecha:') }}</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
            <p style="margin:4px 0;"><strong>{{ __('Cliente:') }}</strong> {{ $order->billingName() }} ({{ $order->billing_email }})</p>
            <p style="margin:4px 0;"><strong>{{ __('Teléfono:') }}</strong> {{ $order->billing_phone ?: '—' }}</p>
            <p style="margin:4px 0;"><strong>{{ __('Cuenta:') }}</strong> {{ $order->user_id ? 'Cliente registrado (#'.$order->user_id.')' : 'Invitado' }}</p>

            <table style="width:100%; border-collapse:collapse; margin-top:16px;">
                <thead>
                    <tr>
                        <th style="text-align:left; border-bottom:2px solid #eee; padding:8px 4px;">{{ __('Producto') }}</th>
                        <th style="text-align:center; border-bottom:2px solid #eee; padding:8px 4px;">{{ __('SKU') }}</th>
                        <th style="text-align:center; border-bottom:2px solid #eee; padding:8px 4px;">{{ __('Cant.') }}</th>
                        <th style="text-align:right; border-bottom:2px solid #eee; padding:8px 4px;">{{ __('Subtotal') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td style="padding:8px 4px; border-bottom:1px solid #f1f1f1;">{{ $item->product_name }}</td>
                            <td style="padding:8px 4px; border-bottom:1px solid #f1f1f1; text-align:center;">{{ $item->product_sku ?: '—' }}</td>
                            <td style="padding:8px 4px; border-bottom:1px solid #f1f1f1; text-align:center;">{{ $item->quantity }}</td>
                            <td style="padding:8px 4px; border-bottom:1px solid #f1f1f1; text-align:right;">{{ number_format((float) $item->line_total, 2, ',', '.') }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p style="margin-top:16px; text-align:right; font-weight:bold;">Total: {{ number_format((float) $order->total, 2, ',', '.') }} €</p>

            <h3 style="font-size:16px; margin-top:24px;">{{ __('Dirección de envío') }}</h3>
            <p style="margin:0; line-height:1.6;">
                {{ $order->billingName() }}<br>
                @if ($order->billing_company) {{ $order->billing_company }}<br> @endif
                {{ $order->billing_address_1 }}<br>
                @if ($order->billing_address_2) {{ $order->billing_address_2 }}<br> @endif
                {{ $order->billing_postcode }} {{ $order->billing_city }}@if ($order->billing_state), {{ $order->billing_state }}@endif<br>
                {{ $order->billing_country }}
            </p>

            @if ($order->customer_note)
                <h3 style="font-size:16px; margin-top:24px;">{{ __('Nota del cliente') }}</h3>
                <p>{{ $order->customer_note }}</p>
            @endif
        </div>
    </div>
</body>
</html>
