<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoyihaijrochilarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fio' => $this->fio,
            'jshshir' => $this->jshshir,
            'science_id' => $this->science_id,
            'state_unit' => $this->shtat_birligi,
            'organization' => $this->tashkilot->name,
            'project' => [
                'id' => $this->ilmiy_loyiha->id,
                'cipher' => $this->ilmiy_loyiha?->raqami,
                'name' => $this->ilmiy_loyiha?->mavzusi,
                'type' => $this->ilmiy_loyiha?->turi,
                'duration' => $this->ilmiy_loyiha?->muddat,
                'program' => $this->ilmiy_loyiha?->dastyri,
                'start_date' => $this->ilmiy_loyiha?->bosh_sana,
                'end_date' => $this->ilmiy_loyiha?->tug_sana,
                'science' => $this->ilmiy_loyiha?->pan_yunalish,
                'fio' => $this->ilmiy_loyiha?->rahbar_name,
                'price' => $this->ilmiy_loyiha?->sum,
            ],
        ];
    }
}
