<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Exception;
use Validator;
use Image;
use App\Employee;
use App\User;
use App\Profile;
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
    public function index(Request $request)
    {
        //$employees = Employee::orderBy('id','DESC')->get();
        $employees = Employee::search($request->medic_name,$request->type)->orderBy('id','DESC')->paginate(5);      
        //dd($employees);
        $employees->each(function($employees){
            $employees->birthdate = ($employees->birthdate == null ? null : date("d-m-Y", strtotime($employees->birthdate)));
            $employees->ubigeo;
            $employees->user;
        });
        //return $employees;
        return [
            'pagination' => [
            'total'            => $employees->total(),
            'current_page'     => $employees->currentPage(),
            'per_page'         => $employees->perPage(),
            'last_page'        => $employees->lastPage(),
            'from'             => $employees->firstItem(),
            'to'               => $employees->lastItem(),
            ],
            'employees' => $employees
        ];      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $profile = Profile::orderBy('id','ASC')->get(['id as value','name as text']);      
      $charge = Charge::orderBy('id','ASC')->get(['id as value','name as text','type']);
      $typedocument = TypeDocument::where('type','identidad')->get(['id as value','name as text']);
      $ubigeo = Ubigeo::orderBy('nombre','ASC')->get(['id as value','nombre as text','coddpto','codprov','coddist']);      
      $hour = Hour::orderBy('name','ASC')->get();

      return [
            'profile'              => $profile,
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
      DB::beginTransaction(); 
      try {
        $rules = ['name' => 'required',
                  'lastname' => 'required'//,
                  //'dni' => 'required'
                 ];

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
        if($request->get('dni')){
            $dni = $request->get('dni');
            $emp_dni = Employee::where('dni',$dni)->count();
            if($emp_dni > 0){
                return response()->json(['errors'=>['DNI ' => 'Ya existe un médico con este numero de DNI : '.$request->get('dni')]]);
            }
        }
        /*-- validacion por nombres y apellidos --*/
        $var_emp = Str::upper($request->get('name')).' '.Str::upper($request->get('lastname'));
        $employee = Employee::where(DB::raw("CONCAT(`name`, ' ', `lastname`)"),$var_emp)->count();
        if($employee > 0){
            return response()->json(['errors'=>['MEDICO ' => 'Ya existe un medico con estos datos : '.$request->get('name').' '.$request->get('lastname')]]);
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
        //$employee->profile_id = $employee->has('profile_id') ? $employee->profile_id : 6;
        $employee->name = Str::upper($employee->name);
        $employee->lastname = Str::upper($employee->lastname);        
        $employee->ubigeo_id = ($employee->ubigeo_id == 0 ? null : $employee->ubigeo_id);
        $employee->save();

        $user = new User();
        $user->name = ($request->has('username')) ? Str::lower($request->username) : null;
        $user->email = ($request->has('email')) ? Str::lower($request->email) : null;
        $user->password = bcrypt('secreto');
        $user->employee_id = $employee->id;
        $user->save();

        DB::commit();        
        return;
      }
      catch(Exception $e){
        DB::rollback();          
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
      DB::beginTransaction(); 
      try {
        $rules = ['name' => 'required',
                  'lastname' => 'required'//,
                  //'dni' => 'required'
                 ];

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
        $employee->name = Str::upper($employee->name);
        $employee->lastname = Str::upper($employee->lastname);          
        $employee->ubigeo_id = ($request->ubigeo_id == 0 ? null : $request->ubigeo_id);
        $employee->save();

        $user = User::find($request->user['id']);
        $user->name = $request->username;
        $user->save();

        DB::commit();
        return;
      } catch (Exception $e) {
        DB::rollback(); 
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
        $employees = Employee::select("employees.id","employees.type"
        		         ,DB::raw("CONCAT(employees.name,' ',employees.lastname) as fullname"))
                     ->where('active',1)->get();
        return $employees;
    }
    public function list_combobox()
    {
        $employees = Employee::select("employees.id as value","employees.type"
        		         ,DB::raw("CONCAT(employees.name,' ',employees.lastname) as text"))
                     ->where('active',1)->get();
        return $employees;
    }    
}
