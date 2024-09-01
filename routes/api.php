<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiPostController;
use App\Http\Controllers\apiCommentController;
use App\Http\Controllers\AuthController;
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
Route::group([

    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::post('me', [AuthController::class, 'me']);

});

Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:api')->apiResource('post', apiPostController::class);
Route::middleware('auth:api')->apiResource('comment', apiCommentController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});