<?php

use Illuminate\Http\Request;
Use App\Campanha;

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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

// Route::group(['middleware' => 'auth:api'], function() {
//     Route::get('campanhas', 'CampanhasController@index');
//     Route::get('campanhas/{campanha}', 'CampanhasController@show');
//     Route::post('campanhas', 'CampanhasController@store');
//     Route::put('campanhas/{campanha}', 'CampanhasController@update');
//     Route::delete('campanhas/{campanha}', 'CampanhasController@delete');
// });

Route::get('campanhas', 'CampanhasController@index');
Route::get('campanhas/{campanha}', 'CampanhasController@show');
Route::post('campanhas', 'CampanhasController@store');
Route::put('campanhas/{campanha}', 'CampanhasController@update');
Route::delete('campanhas/{campanha}', 'CampanhasController@delete');