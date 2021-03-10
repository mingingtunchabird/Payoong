<?php

use App\Http\Controllers\RenterController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
Route::get('/', function () {
    //Alert::success('Success Title', 'Success Message');
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');

    Route::get('/hook', 'HookController@index');
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
    Route::get('/acceptpack/{id}/update','PackageController@update')->name('acceptPackage');

    Route::get('/recieved','PackageController@index')->name('packageRecieved');
    Route::get('/notrecieve','PackageController@index2')->name('notRecieved');

    Route::get('/repair','RenterController@showrepair');
    Route::post('/addRepair','RenterController@addRepair')->name('addRepair');
    Route::get('/accept/{id}/update','StatusController@update')->name('acceptRepair');
    Route::get('/accept/{id}/update2','StatusController@update2')->name('acceptRepair2');

    Route::get('/repairProcessing','StatusController@index')->name('processRepair');

    Route::get('/repairDone','StatusController@index2')->name('doneRepair');

    Route::get('/genbill','RenterController@genbill');

    Route::get('/complain', 'RenterController@complain' );
    Route::post('/addComplain','RenterController@addComplain')->name('addComplain');
    //Route::get('/complain', [App\Http\Controller\RenterController::class, 'complain'] );

    Route::get('/search', 'RenterController@search');

    Route::get('/package/{id}/destroy','PackageController@destroy')->name('destroy');





});

Route::get("/chatbot",  function() {
    ob_start();
    require(public_path("chatbot.php"));
    return ob_get_clean();
});



