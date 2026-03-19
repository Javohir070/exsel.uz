<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoyihaijrochilarResource;
use App\Models\Loyihaijrochilar;
use Illuminate\Http\Request;

class LoyihaijrochilarApiController extends Controller
{
    //

    public function getLoyihaijrochilarProject($jshshir)
    {
        $loyihaijrochilar = Loyihaijrochilar::with('ilmiy_loyiha.tashkilot')->where('jshshir', $jshshir)->get();



        return LoyihaijrochilarResource::collection($loyihaijrochilar);
    }
}
