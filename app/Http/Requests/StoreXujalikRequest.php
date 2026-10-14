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
            'ishlanma_nomi' => 'required|string|max:1024',
            'ishlanma_mavzu' => 'required|string|max:2024',
            'ishlanma_turi' => "required|in:Amaliy,Innovatsion,Fundamental,Xizmat ko'rsatishni",
            'intellektual_raqami' => 'nullable|string|max:600',
            'intellektual_sana' => 'nullable|date',
            'lisenzion' => 'required|in:Xo‘jalik shartnomasi,Litsenziya shartnomasi',
            'sh_raqami' => 'required|string|max:255',
            'sh_sanasi' => 'required|date',
            'ilmiy_nomi' => 'required|string|max:1024',
            'stir' => 'required|digits:9',
            'sh_summa' => 'required|numeric|min:0',
            'shkelib_sana' => 'required|date',
            'shkelib_summa' => 'required|numeric|min:0',

            'chorak1' => 'required|numeric|min:0',
            'chorak2' => 'required|numeric|min:0',
            'chorak3' => 'required|numeric|min:0',
            'chorak4' => 'required|numeric|min:0',
            // Yangi yozuvda shartnoma fayli majburiy, tahrirlashda eski fayl saqlanib qoladi
            'shartnoma_file' => ($this->isMethod('post') ? 'required' : 'nullable') . '|file|max:2048',
            'dalolatnoma_file' => 'nullable|file|max:2048',
            'pul_type' => "required|in:so'm,dollar",
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute maydoni to‘ldirilishi shart.',
            'string' => ':attribute matn bo‘lishi kerak.',
            'max' => [
                'string' => ':attribute :max belgidan oshmasligi kerak.',
                'file' => ':attribute hajmi :max KB dan oshmasligi kerak.',
            ],
            'min' => [
                'numeric' => ':attribute :min dan kichik bo‘lmasligi kerak.',
            ],
            'in' => ':attribute uchun noto‘g‘ri qiymat tanlangan.',
            'date' => ':attribute to‘g‘ri sana bo‘lishi kerak.',
            'numeric' => ':attribute faqat raqam bo‘lishi kerak.',
            'digits' => ':attribute :digits ta raqamdan iborat bo‘lishi kerak.',
            'file' => ':attribute fayl bo‘lishi kerak.',
            'uploaded' => ':attribute yuklanmadi (hajmi juda katta bo‘lishi mumkin).',
        ];
    }

    public function attributes(): array
    {
        return [
            'ishlanma_nomi' => 'Ishlanma nomi',
            'ishlanma_mavzu' => 'Tadqiqot mavzusi',
            'ishlanma_turi' => 'Tadqiqot turi',
            'intellektual_raqami' => 'Intellektual mulk raqami',
            'intellektual_sana' => 'Intellektual mulk sanasi',
            'lisenzion' => 'Shartnoma turi',
            'sh_raqami' => 'Shartnoma raqami',
            'sh_sanasi' => 'Shartnoma sanasi',
            'ilmiy_nomi' => 'Tashkilot yoki korxona nomi',
            'stir' => 'STIR',
            'sh_summa' => 'Shartnoma summasi',
            'shkelib_sana' => 'Kelib tushgan mablag‘ sanasi',
            'shkelib_summa' => 'Kelib tushgan mablag‘ summasi',
            'chorak1' => '1-chorak',
            'chorak2' => '2-chorak',
            'chorak3' => '3-chorak',
            'chorak4' => '4-chorak',
            'shartnoma_file' => 'Shartnoma fayli',
            'dalolatnoma_file' => 'Dalolatnoma fayli',
            'pul_type' => 'Pul birligi',
        ];
    }
}
