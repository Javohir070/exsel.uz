<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIzlanuvchilarRequest extends FormRequest
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
            'fish' => "required|max:600",
            'jshshir'=> "required|digits:14|unique:izlanuvchilars",
            'pasport_seriya'=> "required|max:600",
            'jinsi'=> "required|max:600",
            'talim_turi'=> "required|max:600",
            'ixtisoslik'=> "required|max:600",
            'qabul_qilgan_yil'=> "required|max:600",
            'mavzusi'=> "required|max:600",
            'phone'=> "required|max:600",
            'loyihada_ishtiroki'=> "required|max:600",
        ];
    }
}
