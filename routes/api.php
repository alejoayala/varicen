<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware(['guest'])->group(function () {
  Route::post('register', 'AuthenticateController@register');

});
Route::post('login', 'AuthenticateController@login');
Route::post('refresh-token', 'AuthenticateController@refreshToken');
//Route::get('pdf/{id}', 'PdfController@invoice')->name('pdf');
Route::get('pdf/{id}', 'PdfController@treatments')->name('pdf');

Route::middleware('auth')->group(function () {
  /*Auth::routes();*/
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('patients','PatientsController', ['except' => ['edit']]);
  Route::resource('employees','EmployeesController', ['except' => ['edit']]);
  Route::resource('medicalshifts','MedicalshiftsController', ['except' => ['edit']]);
  Route::resource('quotes','QuotesController', ['except' => ['edit']]);
  Route::resource('affections','AffectionsController', ['except' => ['edit']]);
  Route::resource('attentions','AttentionsController', ['except' => ['edit']]);
  Route::resource('modules','ModulesController', ['except' => ['edit']]); 
  Route::resource('profiles','ProfilesController', ['except' => ['edit']]);  
  Route::resource('exchangerates','ExchangeratesController', ['except' => ['edit']]);   
  Route::resource('chores','ChoresController', ['except' => ['edit']]);     
  Route::resource('bells','BellsController', ['except' => ['edit']]);  
  Route::resource('sales','SalesController', ['except' => ['edit']]);  
  Route::resource('users','UsersController', ['except' => ['edit']]);       
  Route::get('/ubigeo','PatientsController@getTodosUbigeo');
  Route::get('/patientlist','PatientsController@list_autocomplete');
  Route::post('/uploadPdf','PatientsController@uploadPdf');  
  Route::get('/listarPDF/{id}','PatientsController@listarPDF');   
  Route::post('/deletePDF','PatientsController@destroy_file');    
  Route::get('/employeelist','EmployeesController@list_autocomplete');
  Route::get('/employeecombo','EmployeesController@list_combobox');  
  Route::get('/typetreatmentlist','TypetreatmentsController@list_autocomplete');
  Route::get('/typetreatmentcombo','TypetreatmentsController@list_combobox');  
  Route::get('/attentionpatients/{id}','AttentionsController@list_attentions_patient');
  Route::get('/salespatients/{id}','SalesController@list_sales_patient');
  Route::get('/salesdetailspatients/{id}','SalesController@list_sales_details_patient');      
  Route::get('/affectionpatients/{id}','AffectionsController@list_affections_patient');
  Route::get('/paymentspatients/{id}','PaymentsController@list_payments_patient');  
  Route::get('/profiles/modules/{id}','ProfilesController@list_modules_profile'); 
  Route::put('/chores/updatestate/{id}','ChoresController@updateState');       
  Route::post('logout', 'AuthenticateController@logout');
});
