<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndicadoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('indicados', [IndicadoController::class, 'index']);
Route::get('indicado/{indicado}', [IndicadoController::class, 'show']);
Route::post('indicado', [IndicadoController::class, 'store']);
Route::put('indicado/{indicado}', [IndicadoController::class, 'update']);
Route::delete('indicado/{indicado}', [IndicadoController::class,'destroy']);
