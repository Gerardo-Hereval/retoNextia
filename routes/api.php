<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas de autenticación
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);
Route::post('register', [AuthController::class, 'register']);


//rutas para bienes
Route::get('bienes', [BienController::class,'index']);
Route::post('bienes', [BienController::class,'store']);
Route::put('bienes/{id}', [BienController::class,'update']);
Route::delete('bienes/{id}', [BienController::class,'destroy']);
Route::post('bienes/import', [BienController::class,'imports']);
