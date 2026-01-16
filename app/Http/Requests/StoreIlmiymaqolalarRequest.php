<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIlmiymaqolalarRequest extends FormRequest
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
            'type' => 'required|in:Respublika miqyosidagi jurnallar,Xalqaro miqyosidagi jurnallar',
            'mavzu' => 'required|string',
            'mualliflar_json' => 'required|array',
            'chopq_sana' => 'required|date',
            'jurnal_nomi' => 'required|string',
            'jurnal_soni' => 'required|string',
            'jurnal_issn_raqami' => 'required|string',
            'nashriyot' => 'required|string',
            'annotatsiya' => 'required|string',
            'fan_yunalishi' => 'required|string',
            'url' => 'nullable|url',
            'doi' => 'nullable|url',
        ];
    }
}
