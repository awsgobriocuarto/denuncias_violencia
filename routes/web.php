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

    /*----------------------------------------------*/

    # Usuario listar
    Route::get('/users', 'UserController@index')->name('users.index')->middleware('users');

    # Usuario editar
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('users');

   # Usuario actualizar
    Route::patch('/users/{user}', 'UserController@update')->name('users.update')->middleware('users');

    # Usuario eliminar
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('users');

    /*----------------------------------------------*/
    
    # Portal listar
    Route::get('portals/', 'PortalController@index')->name('portals.index')
    ->middleware('portals');
    
    # Portal crear
    Route::get('portals/create', 'PortalController@create')->name('portals.create')
    ->middleware('portals');
    
    // # Portal almacenar
    Route::post('portals/store', 'PortalController@store')->name('portals.store')
    ->middleware('portals');

    // # Portal editar
    Route::get('portals/{portal}/edit', 'PortalController@edit')->name('portals.edit')
    ->middleware('portals');
    
    // # Portal actualizar
    Route::patch('portals/{portal}/update', 'PortalController@update')->name('portals.update')
    ->middleware('portals');
    
    // # Portal borrar
    Route::delete('portals/{portal}', 'PortalController@destroy')->name('portals.destroy')
    ->middleware('portals');
    
    /*----------------------------------------------*/
    
});