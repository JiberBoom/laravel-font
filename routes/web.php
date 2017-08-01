<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function (\Illuminate\Http\Request $request) {

    if(Auth::check()){
        return view('admin.home');
    }else{
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/captcha/{config?}',function(\Mews\Captcha\Captcha $captcha , $config='default'){

    return $captcha->create($config);

});

Route::post('/fonts/thumb/upload','UploadController@FontThumbUpload');

Route::post('/fonts/preview/upload','UploadController@FontPreviewUpload');

//后台路由
Route::group(['namespace' => 'Admin'], function () {

    Route::get('/admin/home','HomeController@index');

    Route::group(['namespace'=>'Fonts'],function(){

        Route::paginate('/admin/fonts/index','FontsController@index');//字体列表

        Route::get('/admin/fonts/add','FontsController@create');

        Route::post('/admin/fonts/store','FontsController@store');//新增字体

        Route::resource('/fonts','FontsController');

        Route::get('/fonts/{id}/changeStatus/{status}','FontsController@changeFontStatus');//上下架操作


    });

});



