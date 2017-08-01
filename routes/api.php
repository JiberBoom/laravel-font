<?php

use Illuminate\Http\Request;

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

//获取语种
Route::middleware('api')->get('/languages', function (Request $request) {

    $language = \App\Models\Language::select(['id','code'])

        ->where('code','like','%'.$request->query('q').'%')

        ->get();

    return $language;
});
