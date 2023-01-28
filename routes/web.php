<?php

use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function (){
    Route::get('giris','App\Http\Controllers\Back\AuthController@login')->name('login');
    Route::post('giris','App\Http\Controllers\Back\AuthController@loginPost')->name('login.post');
});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function (){
    Route::get('panel','App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    //Yazı
    Route::resource('makaleler','App\Http\Controllers\Back\ArticleController');
    //Kategoriler
    Route::get('kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
    Route::post('kategoriler/create','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
    Route::get('kategoriler/getData','App\Http\Controllers\Back\CategoryController@getData')->name('category.getdata');
    Route::post('kategoriler/update','App\Http\Controllers\Back\CategoryController@update')->name('category.update');
    Route::post('kategoriler/delete','App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
    //
    Route::resource('sayfalar','App\Http\Controllers\Back\PageController');

    Route::get('cikis','App\Http\Controllers\Back\AuthController@logout')->name('logout');
});







/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/iletisim','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/iletisim','App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::get('/{category}/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/{sayfa}','App\Http\Controllers\Front\Homepage@page')->name('page');


