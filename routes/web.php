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

Route::get('/clear', function ()
{
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
   // \Illuminate\Support\Facades\Artisan::call('config:cache');
    return 'cleared';
});

Route::get('/', 'WelcomeController@index')->name('welcome');


Auth::routes();


Route::post('books/toggle_favorite/{book}', 'BookController@toggle_favorite')->name('books.toggle_favorite');
Route::resource('books','BookController')->only(['index','show']);


Route::get('categories','CategoryController@index')->name('categories');


Route::resource('authors','AuthorsController')->only(['index','show']);

Route::get('contactus', 'HomeController@contactus')->name('contactus');
Route::post('contactus', ['as'=>'contactus.store','uses'=>'HomeController@contactusAdd']);

Route::get('aboutus','HomeController@aboutus')->name('aboutus');

