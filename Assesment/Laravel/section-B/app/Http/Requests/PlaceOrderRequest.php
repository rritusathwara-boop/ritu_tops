<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow authorized users to place order
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Task 4 requirements:
     * - delivery_address: required, min:10
     * - total_amount: required, numeric, min:0.01
     * - restaurant_id: required, exists:restaurants,id
     */
    public function rules(): array
    {
        return [
            'delivery_address' => 'required|string|min:10',
            'total_amount' => 'required|numeric|min:0.01',
            'restaurant_id' => 'required|exists:restaurants,id',
        ];
    }
}
