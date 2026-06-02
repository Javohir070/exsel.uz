<?php

use App\Http\Controllers\Api\LoyihaijrochilarApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoktaranturaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('daraja-statistics', [DoktaranturaController::class, 'darajaStatistics'])->name('api.daraja_statistics');
Route::get('/project-performers/{jshshir}', [LoyihaijrochilarApiController::class, 'getLoyihaijrochilarProject'])->middleware('auth.basic');
