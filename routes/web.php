<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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


Route::get('/','IndexController@index');

Route::get('/logingeneral', function () {
	return view('welcome');
})->name('logingeneral');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => ['auth','role:admin']], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('/agregarSlider','SliderController@show')->name('agregarSlider')->middleware('auth','role:admin');
Route::post('/crearSlider','SliderController@create')->name('crearSlider')->middleware('auth','role:admin');
Route::get('/editarSlider{slider}','SliderController@showEdit')->name('sliderEdit')->middleware('auth','role:admin');
Route::patch('/updateSlider{slider}','SliderController@editSlider')->name('sliderUpdate')->middleware('auth','role:admin');
Route::get('/usuarios','HomeController@showUsers')->name('mostrarUsuarios')->middleware('auth','role:admin');
Route::get('dataTableUSer', 'UserController@dataTable')->name('dataTableUser');
//----------------------------------------------------------------------------------------
Route::get('/home_negocios', 'HomeController@indexNegocios')->name('homeNegocios')->middleware('auth');
Route::get('/usuarios/{users}/editar','UserController@edit')->name('Editar_Usuarios');

Route::get('/loginAdmin', 'Auth\LoginController@showLoginForm2')->name('loginAdmin');

Route::put('/updateUsersData{users}','UserController@update')->name('updateUsersData')->middleware('auth');

Route::get('/eliminarImagenGaleria/{id}{uid}', 'UserController@eliminarImagen')->name('eliminarImagenGaleria')->middleware('auth');


