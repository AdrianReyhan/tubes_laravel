<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('login', 'App\Http\Controllers\AuthController@login')->name('login');

Route::post('postLogin', 'App\Http\Controllers\AuthController@postLogin');

Route::get('logout', 'App\Http\Controllers\AuthController@logout');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    Route::get('siswa', 'App\Http\Controllers\SiswaController@index');
    
    Route::get('siswa/create', 'App\Http\Controllers\SiswaController@create')->name('siswa.create');

    Route::post('siswa/store', 'App\Http\Controllers\SiswaController@store')->name('siswa.store');
    
    Route::get('siswa/edit/{id}', 'App\Http\Controllers\SiswaController@edit')->name('siswa.edit');
    
    Route::post('siswa/update/{id}', 'App\Http\Controllers\SiswaController@update')->name('siswa.update');
    
    Route::get('siswa/delete/{id}', 'App\Http\Controllers\SiswaController@delete')->name('siswa.delete');
    
    Route::get('siswa/{id}/profile', 'App\Http\Controllers\SiswaController@profile');

    Route::get('guru/{id}/profile' , 'App\Http\Controllers\GuruController@profile')->name('guru.profile');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa']], function () {
    
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index');
});