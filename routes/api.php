<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::post('register', [AuthController::class, 'register']);


    Route::group(['middleware' => 'api'], function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::prefix('registers')->group(function () {
            Route::get('{date}', [RegisterController::class, 'getRegistersByDate']);
            Route::post('', [RegisterController::class, 'store']);

        });
        Route::prefix('members')->group(function () {
            Route::post('', [MemberController::class, 'store']);
            Route::get('', [MemberController::class, 'index']);
            Route::get('{member}', [MemberController::class, 'show']);
            Route::patch('{member}', [MemberController::class, 'update']);


        });

    });
});
