<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStajirovkaExpertRequest extends FormRequest
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
                'ekspert_fish' => 'required|string',
                't_masul' => 'required|string',
                'ilmiy_hisobot' => 'required|string',
                'egallangan_bilim' => 'required|string',
                'ishlar_natijalari' => 'required|string',
                'xalqarotan_jur_nashr' => 'required|string',
                'biryil_davomida' => 'required|string',
                'status' => 'required|string',
                'comment' => 'required|string',
        ];
    }
}
