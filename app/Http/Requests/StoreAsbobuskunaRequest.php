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
            'turi' => 'required|string|max:255',
            'ishlab_davlat' => 'required|string|max:255',
            'ishlabchiq_yil' => 'required|integer|min:1900|max:' . date('Y'),
            'harid_summa' => 'required',
            'buxgalteriya_summa' => 'required',
            'moliya_manbasi' => 'required|string|max:255',
            'loy_shifri' => 'nullable|string|max:255', // **`nullable` to'g'ri yozildi**
            'sh_raqami' => 'required|string|max:255',
            'sh_sanasi' => 'required|date|before:9999-12-31',
            'harid_qilingan_yil' => 'required|integer|min:1900|max:' . date('Y'),
            'holati' => 'required|string|max:255',
            'urnatilgan_yili' => 'required|integer|min:1900|max:' . date('Y'),
            'laboratory_id' => 'required|integer|exists:laboratories,id',
            'jav_buy_raqami' => 'required|string|max:255',
            'jav_sanasi' => 'required|date|before:9999-12-31',
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
