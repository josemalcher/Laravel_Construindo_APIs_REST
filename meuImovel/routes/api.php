<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    RealStateController,
    UserController,
    CategoryController,
    RealStatePhotoController
};
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

Route::prefix('v1')->namespace('Api')->group(function () {
    Route::name('real_states.')->group(function () {
        Route::resource('real-states', '\App\Http\Controllers\Api\RealStateController'); // api/v1/real-states/
    });

    Route::name('users.')->group(function () {
        Route::resource('users', '\App\Http\Controllers\Api\UserController');
    });

    Route::name('categories.')->group(function () {
        Route::get('categories/{id}/real-states', [CategoryController::class, 'realState']);
        Route::resource('categories', '\App\Http\Controllers\Api\CategoryController');
    });

    Route::name('photo.')->prefix('photos')->group(function (){

        Route::delete('/{id}', [RealStatePhotoController::class, 'remove'])->name('delete');

        Route::put('/set-thumb/{photoId}/{realStateId}', [RealStatePhotoController::class, 'setThumb'])->name('setThumb');

    });


});
