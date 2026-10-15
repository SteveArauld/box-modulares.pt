<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Mail\OrderAdminNotificationMail;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request): JsonResponse
    {
        $data = $request->validated();

        $products = Product::query()
            ->whereIn('id', collect($data['items'])->pluck('id'))
            ->get()
            ->keyBy('id');

        $lines = collect($data['items'])->map(function (array $item) use ($products) {
            $product = $products->get($item['id']);

            abort_if(! $product, 422, "Producto #{$item['id']} ya no está disponible.");

            $quantity = (int) $item['quantity'];

            return [
                'product_id' => $product->id,
                'product_name' => $product->translatedValue('name'),
                'product_sku' => $product->sku,
                'quantity' => $quantity,
                'unit_price' => $product->price,
                'line_total' => round($product->price * $quantity, 2),
            ];
        });

        $subtotal = round((float) $lines->sum('line_total'), 2);
        $shipping = 0.0;
        $total = round($subtotal + $shipping, 2);

        $order = DB::transaction(function () use ($data, $lines, $subtotal, $shipping, $total) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'payment_method' => $data['payment_method'] ?? 'bacs',
                'billing_first_name' => $data['billing_first_name'],
                'billing_last_name' => $data['billing_last_name'],
                'billing_email' => $data['billing_email'],
                'billing_phone' => $data['billing_phone'] ?? null,
                'billing_company' => $data['billing_company'] ?? null,
                'billing_country' => $data['billing_country'],
                'billing_address_1' => $data['billing_address_1'],
                'billing_address_2' => $data['billing_address_2'] ?? null,
                'billing_postcode' => $data['billing_postcode'],
                'billing_city' => $data['billing_city'],
                'billing_state' => $data['billing_state'] ?? null,
                'customer_note' => $data['customer_note'] ?? null,
                'subtotal' => $subtotal,
                'shipping_total' => $shipping,
                'total' => $total,
                'currency' => 'EUR',
            ]);

            $order->items()->createMany($lines->all());

            return $order;
        });

        $order->load('items');

        try {
            Mail::to($order->billing_email)->send(new OrderConfirmationMail($order));
            Mail::to(config('mail.admin_address'))->send(new OrderAdminNotificationMail($order));
        } catch (\Throwable $e) {
            Log::error('No se pudieron enviar los correos del pedido '.$order->order_number.': '.$e->getMessage());
        }

        return response()->json([
            'success' => true,
            'order_number' => $order->order_number,
            'redirect' => route('shop.order-confirmation', $order->order_number),
        ]);
    }
}
