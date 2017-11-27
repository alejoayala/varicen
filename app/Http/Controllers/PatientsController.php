<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Validator;
use Image;
use App\Patient;
use App\Ubigeo;
use App\Catchment;
use App\TypeDocument;


class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('id','DESC')->get();

        $patients->each(function($patients){
            $patients->birthdate = ($patients->birthdate == null ? null : date("d-m-Y", strtotime($patients->birthdate)));
            $patients->ubigeo;
        });
        return $patients;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Ubigeo::where('codprov','0 ')->where('coddist','0 ')->distinct('coddpto')->orderBy('nombre','ASC')->get();
        $catchment = Catchment::orderBy('id','ASC')->get();
        $typedocument = TypeDocument::where('type','identidad')->get();
        $ubigeo = Ubigeo::orderBy('nombre','ASC')->get();

        return [
              'departamentos'        => $departamentos,
              'catchment'            => $catchment,
              'typedocument'         => $typedocument,
              'ubigeo'               => $ubigeo,
          ];
    }

    public function getTodosUbigeo(){
      $resultado = Ubigeo::orderBy('nombre','ASC')->get();

      return $resultado;
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
        $pac_dni = Patient::where('dni',$dni)->count();
        if($pac_dni > 0){
            return response()->json(['errors'=>['DNI ' => 'Ya existe un paciente con este numero de DNI : '.$request->get('dni')]]);
        }
        /*-- Validacion de la imagen --*/
        if($request->get('image')){
            $imageData = $request->get('image');
            $fileName = $request->get('dni') . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            Image::make($request->get('image'))->save(public_path('images/').$fileName);
        }

        $patient = new Patient($request->all());
        if(isset($fileName)){
          $patient->photo = $fileName;
        }
        $patient->birthdate = empty($patient->birthdate) ? null : date("Y-m-d", strtotime($patient->birthdate));
        $patient->patient = $patient->name.' '.$patient->lastname;
        $patient->numberhistory = $patient->dni;
        $patient->ubigeo_id = ($patient->ubigeo_id == 0 ? null : $patient->ubigeo_id);
        $patient->save();
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
        //return "hola desde show";
        /*$paciente = Patient::where('id',$patient)->get();
        return $paciente;*/
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
        $patient = Patient::find($id);
        $patient->fill($request->all());
        $patient->birthdate = empty($request->birthdate) ? null : date("Y-m-d", strtotime($request->birthdate));
        $patient->patient = $request->name.' '.$request->lastname;
        $patient->numberhistory = $request->dni;
        $patient->ubigeo_id = ($request->ubigeo_id == 0 ? null : $request->ubigeo_id);
        $patient->save();
        //$patient->fill($request->all());
        //$patient->save();
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
            $patient = Patient::findOrFail($id);
            $patient->delete();
        } catch (Exception $e) {
            return response()->json(
                ['status' => $e->getMessage()], 422
            );
        }

    }

    public function list_autocomplete()
    {
        $patients = Patient::orderBy('patient','DESC')->get(['id','patient AS fullname']);
        //dd($patients);
        return $patients;
    }

}
