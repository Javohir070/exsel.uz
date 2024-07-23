<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreXujalikRequest extends FormRequest
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
            'ishlanma_nomi' => "required|max:1024",
            'ishlanma_mavzu' => "required|max:2024",
            'ishlanma_turi' => "required|max:1024",
            'intellektual_raqami' => "nullable|max:600",
            'intellektual_sana' => "nullable|max:255",
            'lisenzion' => "required|max:600",
            'sh_raqami' => "required|max:255",
            'sh_sanasi' => "required|max:255",
            'ilmiy_nomi' => "required|max:1024",
            'stir' => "required|max:255",
            'sh_summa' => "required|max:255",
            'shkelib_sana' => "required|max:255",
            'shkelib_summa' => "required|max:255",
        ];
    }
}
