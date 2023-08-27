<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    // return ['msg'=> 'Minha primeira resposta de API'];
    $response = new Response(json_encode(['msg'=> 'Minha primeira resposta de API']));
    $response->header('Content-Type', 'application/json');
    return $response;
});

//Route::get('/products', function () {
//    return Product::all();
//});

Route::namespace('App\Http\Controllers\Api')->group(function () {

    Route::prefix('products')->group(function () {
        Route::get('/',         [ProductController::class, 'index']);
        Route::get('/{id}',     [ProductController::class, 'show']);
        Route::post('/',        [ProductController::class, 'save']); //->middleware('auth.basic');
        Route::put('/',         [ProductController::class, 'update']);
        Route::patch('/',       [ProductController::class, 'update']);
        Route::delete('/{id}',  [ProductController::class, 'delete']);
    });

    Route::resource('/users', UserController::class);

});
