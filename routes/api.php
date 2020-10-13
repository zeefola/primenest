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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
 'prefix' => 'v1'
], function ($router){

    Route::post('/property_fetch' , 'PropertyController@fetch');
    Route::post('/property_create' , 'PropertyController@create');
    Route::post('/property_update' , 'PropertyController@update');
    Route::post('/property_delete' , 'PropertyController@delete');


    Route::post('/faq_fetch' , 'FaqController@fetch');
    Route::post('/faq_create' , 'FaqController@create');
    Route::post('/faq_update' , 'FaqController@update');
    Route::post('/faq_delete' , 'FaqController@delete');
    Route::post('/faq_export' , 'FaqController@exportable');

    Route::post('/contact_fetch' , 'ContactController@fetch');
    Route::post('/contact_update' , 'ContactController@update');
    Route::post('/contact_delete' , 'ContactController@delete');
    Route::post('/contact_export' , 'ContactController@exportable');

    Route::post('/application_fetch' , 'ApplicationController@fetch');
    Route::post('/application_update' , 'ApplicationController@update');
    Route::post('/application_delete' , 'ApplicationController@delete');
    Route::post('/application_export' , 'ApplicationController@exportable');


});
