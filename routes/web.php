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

Route::get('/', function () { return view('login');})->name('login');

Route::get('dashboard', function(){ return view('index');})->name('dashboard');

Route::get('agenda', function(){ return view('agenda');})->name('agenda');

Route::get('pacientes', function (){ return view('pacientes');})->name('pacientes');
Route::get('paciente/view', function (){ return view('pacienteview');})->name('pacienteview');
Route::get('paciente/view/cita', function (){ return view('pacienteviewcita');})->name('pacienteviewcita');
Route::get('paciente/view/historial', function (){ return view('pacienteviewhistorial');})->name('pacienteviewhistorial');
Route::get('paciente/view/presupuesto', function (){ return view('pacienteviewpresupuesto');})->name('pacienteviewpresupuesto');
Route::get('paciente/view/documento', function (){ return view('pacienteviewdocumento');})->name('pacienteviewdocumento');
Route::get('paciente/view/imagen', function (){ return view('pacienteviewimagen');})->name('pacienteviewimagen');
Route::get('paciente/view/pagos', function (){ return view('pacienteviewpagos');})->name('pacienteviewpagos');
Route::get('paciente/view/pagoefectuado', function (){ return view('pacienteviewpagoefectuado');})->name('pacienteviewpagoefectuado');
Route::get('paciente/view/pagoanulado', function (){ return view('pacienteviewpagoanulado');})->name('pacienteviewpagoanulado');

Route::get('medicos', function(){ return view('medicos');})->name('medicos');
Route::get('medico/view', function (){ return view('medicoview');})->name('medicoview');
Route::get('medico/view/cita', function (){ return view('medicoviewcita');})->name('medicoviewcita');
Route::get('medico/view/turno', function (){ return view('medicoviewturno');})->name('medicoviewturno');
Route::get('medico/view/produccion', function (){ return view('medicoviewproduccion');})->name('medicoviewproduccion');
Route::get('medico/view/pagorecibido', function (){ return view('medicoviewpagorecibido');})->name('medicoviewpagorecibido');
Route::get('medico/view/balance', function (){ return view('medicoviewbalance');})->name('medicoviewbalance');

Route::get('usuarios', function(){ return view('usuarios');})->name('usuarios');

Route::get('promociones', function () { return view('promociones');})->name('promociones');

Route::get('tareas', function(){ return view('tareas');})->name('tareas');

Route::get('tipodocumento', function(){ return view('tipodocumento');})->name('tipodocumento');

Route::get('empresa', function (){ return view('empresa');})->name('empresa');

Route::get('tipocambio', function(){ return view('tipocambio');})->name('tipocambio');

Route::get('centralreportes', function(){ return view('centralreportes');})->name('centralreportes');

Route::get('pdf', 'PdfController@invoice')->name('pdf');
