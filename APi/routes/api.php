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


//http://127.0.0.1:8000/api/test_api

// now i will create middleware to get permission regardings email and username password to 
// access to this api 


Route::group(['middleware' => ['api','checkPassword']],function(){ // here is we have two middleware
    //Note checkPassword this is from Kernel.php i defineds on it
    Route::post('test_api','categoryController@index');
    Route::post('test_api_by_id','categoryController@getbyID');

});

