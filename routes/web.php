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

/*Route::get('/admin', function () { return view('admin.template.main');})->name('admin');
Route::get('/', function () { return view('application.login.login');})->name('login');*/

Route::get('/{vue_capture?}', function () {
	return view('admin.template.main');
})->where('vue_capture', '[\/\w\.-]*');
