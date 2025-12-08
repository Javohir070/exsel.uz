<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTijoratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'region_id' => 'nullable|exists:regions,id',
            'name' => 'required|string|max:600',
            'loyiha_rahbari' => 'required|string|max:600',
            'ijrochi_tashkilot' => 'required|string|max:600',
            'summa' => 'required|string',
            'tash_summasi' => 'required|string|max:600',
            'region' => 'required|string|max:600',
            'turi' => 'required|string|max:600',
            'yar_ish_urni' => 'required|string|max:600',
            't_soha' => 'required|string|max:600',
            'q_soha' => 'required|string|max:600',
            'm_asosi' => 'required|string|max:600',
        ];
    }
}
