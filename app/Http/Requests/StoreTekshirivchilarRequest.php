<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTekshirivchilarRequest extends FormRequest
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
            'ilmiy_loyiha_id' => 'required',
            'ekspert_fish' => 'required|string',
            't_masul' => 'required|string',
            "status" => 'required|string',
            "comment" => 'required|string',
            'kalendar' => 'required|string',
            'shart_sharoit_yaratib' => 'required|string',
            'yakuniy_natijalar' => 'required|string',
            'loyiha_ijrochilari' => 'required|string',
        ];
    }
}
