<?php

use App\Http\Controllers\RenterController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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
    //Alert::success('Success Title', 'Success Message');
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/search','HomeController@search')->name('search');
    //Route::resource('todo', 'HomeController');
    Route::get('/mywork', 'HomeController@mywork');
    Route::get('/import-form','RenterController@importForm');
    Route::post('/import','RenterController@import')->name('import');

    Route::post('/importuser','RenterController@importuser')->name('importuser');
    Route::get('/add-user','RenterController@adduser');

    Route::post('/importbill','RenterController@importbill')->name('importbill');
    Route::get('/add-bill','RenterController@showbill');

    Route::post('/addnews','RenterController@addnews')->name('addnews');
    Route::get('/news','RenterController@shownews');

    Route::get('/setting','RenterController@showsetting');
    Route::post('/addsetting','RenterController@addsetting')->name('addsetting');

    Route::get('/package','RenterController@showpackage');
    Route::post('/addpackage','RenterController@addpackage')->name('addpackage');

    Route::get('/repair','RenterController@showrepair');
    Route::post('/addRepair','RenterController@addRepair')->name('addRepair');

    Route::get('/genbill','RenterController@genbill');

    Route::get('/complain', 'RenterController@complain' );
    Route::post('/addComplain','RenterController@addComplain')->name('addComplain');
    //Route::get('/complain', [App\Http\Controller\RenterController::class, 'complain'] );

    Route::get('/search', 'RenterController@search');



});



