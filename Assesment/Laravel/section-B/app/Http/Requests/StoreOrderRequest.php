<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'restaurant_id' => ['required', 'exists:restaurants,id'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.menu_item_id' => ['required', 'exists:menu_items,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * Custom validation messages for user feedback.
     */
    public function messages(): array
    {
        return [
            'restaurant_id.required' => 'Please select a restaurant.',
            'restaurant_id.exists' => 'Selected restaurant is invalid.',
            'items.required' => 'You must select at least one menu item.',
            'items.min' => 'You must select at least one menu item.',
            'items.*.quantity.min' => 'Quantity must be at least 1.',
        ];
    }
}
