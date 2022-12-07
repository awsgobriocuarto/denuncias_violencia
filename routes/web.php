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

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    # Usuario listar
    Route::get('/users', 'UserController@index')->name('users.index');

    # Usuario editar
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');

   # Usuario actualizar
    Route::patch('/users/{user}', 'UserController@update')->name('users.update');

    # Usuario eliminar
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');


});