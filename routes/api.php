<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/apiTest', function (Request $request) {
    return response()->json(['status => ok', 'id' => $request->id],
    JSON_UNESCAPED_UNICODE);
})->middleware('api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



