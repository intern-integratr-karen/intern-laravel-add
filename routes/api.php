<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/persons', [PersonController::class, 'index']);
Route::post('/persons', [PersonController::class,'store']);
Route::get('/persons/{id}', [PersonController::class,'show']);
Route::put('/persons/{id}', [PersonController::class,'update']);
Route::delete('/persons/{id}', [PersonController::class,'destroy']);
