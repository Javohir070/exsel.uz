<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStajirovkaRequest extends FormRequest
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
            'ilmiy_hisobot' => 'required|file|mimes:zip,rar|max:10480',
            'egallangan_bilim' => 'required|file|mimes:zip,rar|max:10480',
            'ishlar_natijalari' => 'required|file|mimes:zip,rar|max:10480',
            'xalqarotan_jur_nashr' => 'required|file|mimes:zip,rar|max:10480',
            'biryil_davomida' => 'required|file|mimes:zip,rar|max:10480',
        ];
    }

    public function messages(): array
    {
        return [
            'mimes' => 'Faqat ZIP yoki RAR fayllar yuklanishi mumkin!',
        ];
    }
}
