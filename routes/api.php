<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\CartsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:api')->post('/user/cart/add-item', [
//     AccountController::class, 'add_cart'
// ]);

// Route::group(['prefix'=>'user'], function () {
//     Route::post('/cart/add-item',  [
//         CartsController::class, 'add_cart'
//     ]);
// });