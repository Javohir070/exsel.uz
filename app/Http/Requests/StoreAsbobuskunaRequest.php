<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsbobuskunaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'regex:/^[A-Za-z\s]+$/'], // Faqat lotin harflari va bo'sh joy
            'model' => ['required', 'regex:/^[A-Za-z0-9\s]+$/'], // Lotin harflari, raqamlar va bo'sh joy
            'fish' => ['required', 'regex:/^[A-Za-z0-9\s]+$/'], // Lotin harflari, raqamlar va bo'sh joy
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Ism maydoni to‘ldirilishi shart.',
            'name.regex' => 'Ism faqat lotin harflaridan iborat bo‘lishi kerak.',
            'model.required' => 'Model maydoni to‘ldirilishi shart.',
            'model.regex' => 'Model nomi faqat lotin harflari va raqamlardan iborat bo‘lishi kerak.',
            'fish.required' => 'Model maydoni to‘ldirilishi shart.',
            'fish.regex' => 'Model nomi faqat lotin harflari va raqamlardan iborat bo‘lishi kerak.',
        ];
    }
}
