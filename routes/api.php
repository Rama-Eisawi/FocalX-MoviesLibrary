<?php

use App\Http\Controllers\MovieController;
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

Route::apiResource('movie', MovieController::class);

/*Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::middleware('guest:sanctum')
            ->group(function () {
                Route::post('register', 'register')->name('auth.register');
                Route::post('login', 'login')->name('auth.login');
            });
        Route::middleware('auth:sanctum')
            ->group(function () {
                Route::post('logout', 'logout')->name('auth.logout');
            });
    });*/
