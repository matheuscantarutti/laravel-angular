<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndicadoController;
use App\Http\Controllers\EnumController;

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
Route::patch('indicado/{indicado}', [IndicadoController::class,'evoluir'])->name('evolucao');

Route::get('enum/{classe}', [EnumController::class, 'show']);

Route::fallback(function(){

    return response()->json(['message' => 'Not Found.'], 404);

})->name('api.fallback.404');
