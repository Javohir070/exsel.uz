<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIlmiybnTaminlangaRequest extends FormRequest
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
            'xodimlar_jami' => "required|max:255",
            'ilmiy_xodimlar' => "required|max:255",
            'name' => "required|max:2024",
            'turi' => "required|max:1024",
            'moliyal_jami' => "required|max:1024",
            'xodimganisbat_jami' => "required|max:1024",
        ];
    }
}
