<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('me', function () {
    // Let's return fake information.
    return [
        'name' => 'Alex Souza',
        'initials' => 'AS',
    ];
});

Route::get('product/list', 'ProductController@listAction');
Route::get('product/{productId}', 'ProductController@getAction');
Route::get('product/search/{query}', 'ProductController@searchAction');
