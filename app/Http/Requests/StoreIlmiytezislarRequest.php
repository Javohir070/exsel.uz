<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIlmiytezislarRequest extends FormRequest
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
        // max qiymatlari bazadagi ustun o'lchamlariga mos (varchar(255) / TEXT),
        // aks holda uzun matn "Data too long" bilan 500 xato beradi.
        return [
            'type' => 'required|string|max:255',
            'mavzu' => 'required|string|max:5000',
            'mualliflar_json' => 'required|array',
            'chopq_sana' => 'required|date',
            'kon_full_nomi' => 'required|string|max:1000',
            'kon_qisqa_nomi' => 'required|string|max:255',
            'soni' => 'required|string|max:255',
            'nashriyot' => 'required|string|max:255',
            'annotatsiya' => 'required|string|max:20000',
            'fan_yunalishi' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'doi' => 'nullable|url|max:255',
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
            'max' => 'Bu maydon :max belgidan oshmasligi kerak.',
        ];
    }
}
