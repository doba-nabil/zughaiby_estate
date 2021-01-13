<?php

use Illuminate\Support\Facades\Route;

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

/*****************/
View::creator('frontend.layout.master', function ($view) {
    $view->with('option' , \App\Models\Option::find(1));
});
Route::group(['middleware' => 'auth:moderator'], function () {
    Route::get('/', 'Admin\AdminController@index');
});
Auth::routes();

