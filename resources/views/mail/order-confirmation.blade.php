<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Confirmación de pedido') }}</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background:#f7f7f7; margin:0; padding:24px; color:#242424;">
    <div style="max-width:600px; margin:0 auto; background:#ffffff; border-radius:8px; overflow:hidden; border:1px solid #eee;">
        <div style="background:#242424; padding:20px 24px;">
            <h1 style="color:#fff; font-size:20px; margin:0;">{{ config('app.name') }}</h1>
        </div>
        <div style="padding:24px;">
            <h2 style="font-size:18px; margin-top:0;">¡Gracias por tu pedido, {{ $order->billing_first_name }}!</h2>
            <p>{{ __('Hemos recibido tu pedido correctamente. Aquí tienes el resumen:') }}</p>

            <p style="margin:4px 0;"><strong>{{ __('Número de pedido:') }}</strong> {{ $order->order_number }}</p>
            <p style="margin:4px 0;"><strong>{{ __('Fecha:') }}</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
            <p style="margin:4px 0;"><strong>{{ __('Método de pago:') }}</strong> {{ __('Transferencia bancaria directa') }}</p>

            <table style="width:100%; border-collapse:collapse; margin-top:16px;">
                <thead>
                    <tr>
                        <th style="text-align:left; border-bottom:2px solid #eee; padding:8px 4px;">{{ __('Producto') }}</th>
                        <th style="text-align:center; border-bottom:2px solid #eee; padding:8px 4px;">{{ __('Cant.') }}</th>
                        <th style="text-align:right; border-bottom:2px solid #eee; padding:8px 4px;">{{ __('Subtotal') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td style="padding:8px 4px; border-bottom:1px solid #f1f1f1;">{{ $item->product_name }}</td>
                            <td style="padding:8px 4px; border-bottom:1px solid #f1f1f1; text-align:center;">{{ $item->quantity }}</td>
                            <td style="padding:8px 4px; border-bottom:1px solid #f1f1f1; text-align:right;">{{ number_format((float) $item->line_total, 2, ',', '.') }} €</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" style="padding:8px 4px; text-align:right;">{{ __('Subtotal') }}</td>
                        <td style="padding:8px 4px; text-align:right;">{{ number_format((float) $order->subtotal, 2, ',', '.') }} €</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 4px; text-align:right;">{{ __('Envío') }}</td>
                        <td style="padding:8px 4px; text-align:right;">
                            @if ((float) $order->shipping_total > 0)
                                {{ number_format((float) $order->shipping_total, 2, ',', '.') }} €
                            @else
                                Gratuito
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:8px 4px; text-align:right; font-weight:bold;">{{ __('Total') }}</td>
                        <td style="padding:8px 4px; text-align:right; font-weight:bold;">{{ number_format((float) $order->total, 2, ',', '.') }} €</td>
                    </tr>
                </tfoot>
            </table>

            <h3 style="font-size:16px; margin-top:24px;">{{ __('Dirección de facturación') }}</h3>
            <p style="margin:0; line-height:1.6;">
                {{ $order->billingName() }}<br>
                @if ($order->billing_company) {{ $order->billing_company }}<br> @endif
                {{ $order->billing_address_1 }}<br>
                @if ($order->billing_address_2) {{ $order->billing_address_2 }}<br> @endif
                {{ $order->billing_postcode }} {{ $order->billing_city }}@if ($order->billing_state), {{ $order->billing_state }}@endif<br>
                {{ $order->billing_country }}<br>
                @if ($order->billing_phone) {{ $order->billing_phone }}<br> @endif
                {{ $order->billing_email }}
            </p>

            <p style="margin-top:24px; color:#666; font-size:13px;">{{ __('Te avisaremos en cuanto tu pedido salga hacia tu dirección. Si tienes cualquier duda, responde a este correo.') }}</p>
        </div>
    </div>
</body>
</html>
