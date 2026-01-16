<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoktaranturaExpertRequest extends FormRequest
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
            'status' => 'required|string',
            'comment' => 'required|string',
            "umumiy_izlanuvchilar" => 'required|string',
            "yagonae_tah_soni" => 'required|string',
            "chetlash_soni" => 'required|string',
            "akademik_soni" => 'required|string',
            "muddatidano_soni" => 'required|string',
            "kiritilmagan_soni" => 'required|string',
            "rejani_bajarmagan" => 'required|string',
            "mon_nat_kiritilmagan" => 'required|string',
            "biriktirilgan_rahbarlar" => 'required|string',
            "kollegial_rahbarlar" => 'required|string',
            "meyoridan_rahbarlar" => 'required|string',
            "tash_ortiq_rahbarlar" => 'required|string',
        ];
    }
}
