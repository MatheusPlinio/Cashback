<?php

use App\Http\Controllers\AdminController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Store;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/page/{id}', 'HomeController@page')->name('app.page');
    

Route::middleware('auth')->prefix('/app')->group(function () {
    Route::get('/contato', 'HomeController@contato')->name('app.contato');
    Route::get('/sobre', 'HomeController@sobre')->name('app.sobre');
});




//Rotas do admin

Route::middleware('auth', 'isAdmin')->prefix('/admin')->group(function (){
    Route::resource('store', 'StoreController');
    Route::resource('cashback', 'CashbackController');
    Route::resource('cashback_to_add', 'CashbackToAddController');
    Route::get('/list_store', 'StoreListController@index')->name('list_store.index');
    Route::post('/list_store', 'StoreListController@index')->name('list_store.index');
    Route::get('/list_cashback', 'CashbackListController@index')->name('list_cashback.index');
    Route::post('/list_cashback', 'CashbackListController@index')->name('list_cashback.index');
    Route::post('/update/store{store}', 'HomeController@store')->name('update.store');
    Route::get('/cashback_add/{store}', 'HomeController@edit')->name('cashback_add.edit');
    Route::get('/cashback_update{store}', 'HomeController@update')->name('cashback_update.update');
    /*Route::get('/index', 'AdminController@index')->name('admin.index');
    Route::post('/index', 'AdminController@create')->name('admin.create');
    Route::get('/list', 'AdminController@list')->name('admin.list');
    Route::post('/list', 'AdminController@list')->name('admin.list');
    Route::get('/cashback', 'AdminController@cashback')->name('admin.cashback');
    Route::post('/cashback', 'AdminController@cashback_to_add')->name('admin.cashback_to_add');
    Route::get('/list/edit/{id}', 'AdminController@edit')->name('admin.edit');
    Route::get('/cashback/edit/{id}', 'AdminController@Cashback_edit')->name('admin.Cashback_edit');
    Route::get('/list/cashback', 'AdminController@list_Cashback')->name('admin.list_cashback');
    Route::post('/list/cashback', 'AdminController@list_Cashback')->name('admin.list_cashback');
    Route::post('/cashback/add/{id}', 'CashbackController@cashback_add')->name('admin.cashback_add');
    Route::get('/cashback/add/{id}', 'CashbackController@index')->name('admin.cashback_add');*/
});