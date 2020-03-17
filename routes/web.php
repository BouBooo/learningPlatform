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

Route::get('/', 'MainController@home')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    
    return Redirect::to('/');
})->name('logout');

Route::get('/courses', 'CoursesController@index')->name('courses.index');
