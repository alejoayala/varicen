<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Validator;
use Image;
use App\Employee;
use App\Ubigeo;
use App\Charge;
use App\TypeDocument;
use App\Hour;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employees = Employee::orderBy('id','DESC')->get();

      $employees->each(function($employees){
          $employees->birthdate = ($employees->birthdate == null ? null : date("d-m-Y", strtotime($employees->birthdate)));
          $employees->ubigeo;
      });
      return $employees;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //$departamentos = Ubigeo::where('codprov','0 ')->where('coddist','0 ')->distinct('coddpto')->orderBy('nombre','ASC')->get();
      $charge = Charge::orderBy('id','ASC')->get();
      $typedocument = TypeDocument::where('type','identidad')->get();
      $ubigeo = Ubigeo::orderBy('nombre','ASC')->get();
      $hour = Hour::orderBy('name','ASC')->get();

      return [
            'charge'               => $charge,
            'typedocument'         => $typedocument,
            'ubigeo'               => $ubigeo,
            'hour'                 => $hour,
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $rules = ['name' => 'required',
                  'lastname' => 'required',
                  'dni' => 'required'];

        if(!empty($request->get('birthdate'))){
          $rules = array_add($rules, 'birthdate', 'date_format:d/m/Y');
        }
        if($request->get('image')){
          $rules = array_add($rules, 'image', 'image64:jpeg,jpg,png');
        }
        $messages = ['birthdate.date_format' => 'Formato de fecha invalido',
                     'image.image64' => 'formato de imagen invalido'];

        $validator = Validator::make($request->all(), $rules , $messages);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        /*-- validacion del DNI --*/
        $dni = $request->get('dni');
        $emp_dni = Employee::where('dni',$dni)->count();
        if($emp_dni > 0){
            return response()->json(['errors'=>['DNI ' => 'Ya existe un médico con este numero de DNI : '.$request->get('dni')]]);
        }
        /*-- Validacion de la imagen --*/
        if($request->get('image')){
            $imageData = $request->get('image');
            $fileName = $request->get('dni') . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            Image::make($request->get('image'))->save(public_path('images/').$fileName);
        }

        $employee = new Employee($request->all());
        if(isset($fileName)){
          $employee->photo = $fileName;
        }
        $employee->birthdate = empty($employee->birthdate) ? null : date("Y-m-d", strtotime($employee->birthdate));
        $employee->ubigeo_id = ($employee->ubigeo_id == 0 ? null : $employee->ubigeo_id);
        $employee->save();
        return;
      }
      catch(Exception $e){
        return response()->json(
            ['status' => $e->getMessage()], 422
        );
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
        $rules = ['name' => 'required',
                  'lastname' => 'required',
                  'dni' => 'required'];

        if(!empty($request->get('birthdate'))){
          $rules = array_add($rules, 'birthdate', 'date_format:d/m/Y');
        }
        $messages = ['birthdate.date_format' => 'Formato de fecha invalido'];

        $validator = Validator::make($request->all(), $rules , $messages);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $employee = Employee::find($id);
        $employee->fill($request->all());
        $employee->birthdate = empty($request->birthdate) ? null : date("Y-m-d", strtotime($request->birthdate));
        $employee->ubigeo_id = ($request->ubigeo_id == 0 ? null : $request->ubigeo_id);
        $employee->save();
        return;
      } catch (Exception $e) {
        return response()->json(
            ['status' => $e->getMessage()], 422
        );
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
          $employee = Employee::findOrFail($id);
          $employee->delete();
      } catch (Exception $e) {
          return response()->json(
              ['status' => $e->getMessage()], 422
          );
      }
    }
    public function list_autocomplete()
    {
        //$employees = Employee::orderBy('name','DESC')->get(['id','CONCAT(name,lastname) AS name','type']);
        $employees = Employee::select("employees.id","employees.type"
        		         ,DB::raw("CONCAT(employees.name,' ',employees.lastname) as fullname"))
                     ->get();
        return $employees;
    }
}
