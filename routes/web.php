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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::any('/search','HomeController@search')->name('search');
    Route::any('/filter','HomeController@filter')->name('filter');
    //Route::get('/create', 'HomeController@create');
    Route::resource('todo', 'HomeController');
    Route::get('/mywork', 'HomeController@mywork');
    Route::get('/toptag', 'admin\AdminController@index');

});

Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index');
    });
});

