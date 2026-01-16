<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoktaranturaexpertRequest extends FormRequest
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
            'tashkilot_id' => 'required|integer',
            'status' => 'required|string',
            'comment' => 'nullable|string',
            "umumiy_izlanuvchilar" => "required|integer",
            "yagonae_tah_soni" => "required|integer",
            "chetlash_soni" => "required|integer",
            "akademik_soni" => "required|integer",
            "muddatidano_soni" => "required|integer",
            "kiritilmagan_soni" => "required|integer",
            "rejani_bajarmagan" => "required|integer",
            "mon_nat_kiritilmagan" => "required|integer",
            "biriktirilgan_rahbarlar" => "required|integer",
            "kollegial_rahbarlar" => "required|integer",
            "meyoridan_rahbarlar" => "required|integer",
            'tash_ortiq_rahbarlar' => "required|integer",
        ];
    }
}
