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

Route::group(['middleware'=>['client']],function(){
    Route::get('users_list','api\baseController@users_list');

});
Route::group(['middleware'=>['auth:api']],function(){
    Route::post('edit_user','api\baseController@edit_user');
});

