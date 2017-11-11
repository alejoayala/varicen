<?php

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

/*Route::get('/admin', function () { return view('admin.template.main');})->name('admin');*/
Route::get('/', function () { return view('application.login.login');})->name('login');

/*Route::get('pdf', 'PdfController@invoice')->name('pdf');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('patients','PatientsController', ['except' => ['edit']]);

Route::get('/ubigeo','PatientsController@getTodosUbigeo');
