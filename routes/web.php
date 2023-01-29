<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('main');

Route::fallback(function () {
    return view('index');
});

Auth::routes();
Route::get('/admin', 'App\Http\Controllers\AdminController@showform')->name('showform');
Route::get('/mainPageAdmin', 'App\Http\Controllers\AdminController@mainPageAdmin')->name('mainPageAdmin');
Route::post('administrator', 'App\Http\Controllers\AdminController@loginadmin')->name('administrator');
Route::get('/AddDataInDb', 'App\Http\Controllers\AdminController@showaction')->name('AddDataInDb');
Route::get('/EditDataInDb', 'App\Http\Controllers\EditDeleteDataController@EditDataInDb')->name('EditDataInDb')->middleware("CheckCookie");
Route::post('/controldata', 'App\Http\Controllers\ControlDataController@control')->name('controldata');
Route::get('/DeleteData/{id}', 'App\Http\Controllers\EditDeleteDataController@deletedata')->name('DeleteData')->middleware("CheckCookie");
Route::get('/EditData/{id}', 'App\Http\Controllers\EditDeleteDataController@editdata')->name('EditData')->middleware("CheckCookie");

Route::post('/FindByCategory', 'App\Http\Controllers\EditDeleteDataController@FindByCategory')->name('FindByCategory')->middleware("CheckCookie");
Route::post('/FindByPrice', 'App\Http\Controllers\EditDeleteDataController@FindByPrice')->name('FindByPrice')->middleware("CheckCookie");
Route::post('/FindByName', 'App\Http\Controllers\EditDeleteDataController@FindByName')->name('FindByName')->middleware("CheckCookie");

Route::post('/NewEditionProduct/{id}', 'App\Http\Controllers\NewEditionProductController@NewEdition')->name('NewEditionProduct');

Route::post('/order', "App\Http\Controllers\OrderController@MakeOrder")->name('OrderController');

Route::get('/WorkWithOrders', 'App\Http\Controllers\WorkWithOrdersController@index')->name('WorkWithOrders')->middleware("CheckCookie");
Route::get('/ListOrders', 'App\Http\Controllers\WorkWithOrdersController@showListOrders')->name('ListOrders')->middleware("CheckCookie");
Route::get('/ListCompletedOrders', 'App\Http\Controllers\WorkWithOrdersController@showCompletedOrders')->name('ListCompletedOrders')->middleware("CheckCookie");
Route::get('/ListNotDoneOrders', 'App\Http\Controllers\WorkWithOrdersController@showNotDoneOrders')->name('ListNotDoneOrders')->middleware("CheckCookie");
Route::post('/selectOrderByDate', 'App\Http\Controllers\WorkWithOrdersController@selectOrderByDate')->name('selectOrderByDate');
Route::post('/selectOrderByPeriod', 'App\Http\Controllers\WorkWithOrdersController@selectOrderByPeriod')->name('selectOrderByPeriod');
Route::get('/ordercompleted/{id}', 'App\Http\Controllers\WorkWithOrdersController@ordercompleted')->name('ordercompleted')->middleware("CheckCookie");
Route::get('/orderdelete/{id}', 'App\Http\Controllers\WorkWithOrdersController@orderdelete')->name('orderdelete')->middleware("CheckCookie");
Route::post('/selectClient', 'App\Http\Controllers\WorkWithOrdersController@selectClient')->name('selectClient');
Route::post('/selectClientByPhone', 'App\Http\Controllers\WorkWithOrdersController@selectClientByPhone')->name('selectClientByPhone');

Route::get('/cabinet', 'App\Http\Controllers\CabinetController@index')->name('cabinet');
Route::get('/home', 'App\Http\Controllers\UserCabinetController@index')->name('UserCabinet');
Route::get('/MyOrders', 'App\Http\Controllers\UserCabinetController@MyOrders')->name('MyOrders');
Route::get('/message', 'App\Http\Controllers\UserCabinetController@message')->name('message');
Route::post('/SendMessage', 'App\Http\Controllers\UserCabinetController@SendMessage')->name('SendMessage');
Route::get('/messagedelete/{id}', 'App\Http\Controllers\UserCabinetController@messagedelete')->name('messagedelete');
Route::get('/ReadMessageFromUsers','App\Http\Controllers\UserCabinetController@ReadMessageFromUsers')->name('ReadMessageFromUsers');

Route::get('/UnknowUser', 'App\Http\Controllers\UnknowUserController@index')->name('UnknowUser');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/getAllMessageForAboutUs', 'App\Http\Controllers\CabinetController@getAllMessageForAboutUs')->name('getAllMessageForAboutUs');
Route::post('/LetterFromVizitor', 'App\Http\Controllers\LetterFromVizitorController@sendLetterFromVizitor')->name('LetterFromVizitor');
Route::get('/GetLettersFromVizitors', 'App\Http\Controllers\LetterFromVizitorController@GetLettersFromVizitors')->name('GetLettersFromVizitors');
Route::get('/LetterFromVizitorDelete/{id}', 'App\Http\Controllers\LetterFromVizitorController@LetterFromVizitorDelete')->name('LetterFromVizitorDelete');

