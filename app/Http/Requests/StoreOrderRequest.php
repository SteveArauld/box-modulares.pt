<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'billing_first_name' => ['required', 'string', 'max:100'],
            'billing_last_name' => ['required', 'string', 'max:100'],
            'billing_email' => ['required', 'email', 'max:190'],
            'billing_phone' => ['nullable', 'string', 'max:40'],
            'billing_company' => ['nullable', 'string', 'max:150'],
            'billing_country' => ['required', 'string', 'size:2'],
            'billing_address_1' => ['required', 'string', 'max:190'],
            'billing_address_2' => ['nullable', 'string', 'max:190'],
            'billing_postcode' => ['required', 'string', 'max:20'],
            'billing_city' => ['required', 'string', 'max:120'],
            'billing_state' => ['nullable', 'string', 'max:120'],
            'customer_note' => ['nullable', 'string', 'max:2000'],
            'payment_method' => ['nullable', 'string', 'in:bacs'],

            'items' => ['required', 'array', 'min:1'],
            'items.*.id' => ['required', 'integer', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ];
    }
}
