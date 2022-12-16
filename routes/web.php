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
    
    # Denuncia listar
    Route::get('complaints/', 'ComplaintController@index')->name('complaints.index')
    ;
    
    # Complaint crear
    Route::get('complaints/create', 'ComplaintController@create')->name('complaints.create')
    ;
    
    # Denuncia almacenar
    Route::post('complaints/store', 'ComplaintController@store')->name('complaints.store')
    ->middleware('complaints.portalOwner')
    ;
    
    # Denuncia editar
    Route::get('complaints/{complaint}/edit', 'ComplaintController@edit')->name('complaints.edit')
    ->middleware('complaints.portalOwner')
    ;
    
    # Denuncia actualizar
    Route::patch('complaints/{complaint}/update', 'ComplaintController@update')->name('complaints.update')
    ->middleware('complaints.portalOwner')
    ;
    
    # Denuncia borrar
    Route::delete('complaints/{complaint}', 'ComplaintController@destroy')->name('complaints.destroy')
    ->middleware('complaints.portalOwner')
    ;
    
    /*----------------------------------------------*/

});