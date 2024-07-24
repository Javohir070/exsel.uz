<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIqtisodiyMoliyaviyRequest extends FormRequest
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
            'kadastr_raqami' => 'required|max:255',
            'u_maydoni' => 'required|max:255',
            'taj_maydonlari' => 'required|max:255',
            'binolar_soni' => 'required|max:255',
            'auditoriya_sigimi' => 'required|max:255',
            'k_xaj_auditor_soni' => 'required|max:255',
            'pondi_miqdori' => 'required|max:255',
            'ilmiyp_bulinalar' => 'required|max:255',
            'gaz' => 'required|max:255',
            'elektr' => 'required|max:255',
            'suv' => 'required|max:255',
            'kanalizasiya' => 'required|max:255',
            'internet' => 'required|max:255',
        ];
    }
}
