<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::post('requestToken', [ApiController::class, 'requestToken']);
Route::post('logout', [ApiController::class, 'logout']);
Route::get('getUserById/{id}', [ApiController::class, 'getUserById']);
