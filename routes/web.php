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
Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/page/{id}', 'PageController@index')->name('app.page.page');
    

Route::middleware('auth')->prefix('/app')->group(function () {
    Route::get('/contato', 'ContactController@index')->name('app.contact.index');
    Route::get('/info', 'InfoController@index')->name('app.info.index');
    Route::get('/profile/show', 'ProfileController@show')->name('app.profile.show');
});

                                //Routes of admin//

Route::middleware('auth', 'isAdmin')->prefix('/admin')->group(function (){
    
                            ///*Store admin routes*///

    Route::get('/store/index', 'StoreController@index')->name('admin.store.index');

    Route::get('/store/edit/{id}', 'StoreController@edit')->name('admin.store.edit');

    Route::post('/store/post', 'StoreController@store')->name('admin.store.store');

    Route::get('/store/show', 'StoreController@show')->name('admin.store.show');

    Route::post('/store/show', 'StoreController@show')->name('admin.store.show');

    Route::post('/store/destroy/{store}', 'StoreController@destroy')->name('admin.store.destroy');

                            ///*Store admin routes*///
                                /***************/
                            ///*Shop admin routes*///
    Route::get('/shop/index', 'ShopController@index')->name('admin.shop.index');

    Route::post('/shop/post', 'ShopController@store')->name('admin.shop.store');

    Route::get('/shop/edit{id}', 'ShopController@edit')->name('admin.shop.edit');

    Route::get('/shop/show', 'ShopController@show')->name('admin.shop.show');
    
    Route::post('/shop/show', 'ShopController@show')->name('admin.shop.show');

    Route::post('/shop/destroy/{store}', 'ShopController@destroy')->name('admin.shop.destroy');

                            ///*Shop admin routes*///
                                /***************/
                        ///*Cashback admin routes*///
    Route::get('/cashback/index/', 'CashbackController@index')->name('admin.cashback.index');

    Route::get('/cashback/edit/{store}', 'CashbackController@edit')->name('admin.cashback.edit');

    Route::post('/cashback/store/{store}', 'CashbackController@store')->name('admin.cashback.store');
                            ///*Cashback admin routes*///
                                ///*Manager Routes*///
    Route::get('/manager/index/', 'AdminController@index')->name('manager.index');

    Route::get('/manager/edit{id}', 'AdminController@edit')->name('manager.edit');

    Route::post('/manage/update/{id}', 'AdminController@update')->name('manager.update');
});