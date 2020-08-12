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

 Route::get('/employee', function () {
    return view('employee');
}); 
/*first way*/
//Route::view('employee','employee');

/*second way*/
//Route::redirect('/','employee');

Route::get('/employeee','Users@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
