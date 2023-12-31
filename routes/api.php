<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;


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
Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('get-user', [AuthController::class, 'getUser']);
        Route::get('/registersdate', [RegisterController::class, 'getRegistersByDate']);
        Route::post('/registerinfo', [RegisterController::class, 'store']);
        Route::post('/members/register', [MemberController::class, 'store']);
        Route::get('/members', [MemberController::class, 'index']);
    });
});

