<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;        // facade para saber el usuario autentificado Auth::user() -- Auth::id() -- Auth::check()
use Exception;
use Validator;
use Image;
use App\Patient;
use App\Ubigeo;
use App\Catchment;
use App\TypeDocument;
use App\Product;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patients = Patient::search($request->patient_name)->orderBy('id','DESC')->paginate(5);

        $patients->each(function($patients){
            $patients->birthdate = ($patients->birthdate == null ? null : date("d-m-Y", strtotime($patients->birthdate)));
            $patients->ubigeo;
            $patients->affections;
        });
        //return $patients;

        return [
          'pagination' => [
            'total'            => $patients->total(),
            'current_page'     => $patients->currentPage(),
            'per_page'         => $patients->perPage(),
            'last_page'        => $patients->lastPage(),
            'from'             => $patients->firstItem(),
            'to'               => $patients->lastItem(),
          ],
          'patients' => $patients
        ];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catchment = Catchment::orderBy('id','ASC')->get(['id as value','name as text']);
        $typedocument = TypeDocument::where('type','identidad')->get(['id as value','name as text']);
        $ubigeo = Ubigeo::orderBy('nombre','ASC')->get(['id as value','nombre as text','coddpto','codprov','coddist']);
        $product = Product::orderBy('id','ASC')->get();

        return [
              //'departamentos'        => $departamentos,
              'catchment'            => $catchment,
              'typedocument'         => $typedocument,
              'ubigeo'               => $ubigeo,
              'product'              => $product,
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
      DB::beginTransaction();    
      $afe_pac = $request->get('afecciones');

      try {
        $rules = ['name' => 'required',
                  'lastname' => 'required'//,
                  //'dni' => 'required'
                ];

        if($request->has('birthdate')){
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
            $pac_dni = Patient::where('dni',$dni)->count();
            if($pac_dni > 0){
                return response()->json(['errors'=>['DNI ' => 'Ya existe un paciente con este numero de DNI : '.$request->get('dni')]]);
            }
        }

        /*-- validacion por nombres y apellidos --*/
        $var_pac = Str::upper($request->get('name')).' '.Str::upper($request->get('lastname'));
        $paciente = Patient::where('patient',$var_pac)->count();
        if($paciente > 0){
            return response()->json(['errors'=>['PACIENTE ' => 'Ya existe un paciente con estos datos : '.$request->get('name').' '.$request->get('lastname')]]);
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
        $patient->name = Str::upper($patient->name);
        $patient->lastname = Str::upper($patient->lastname);
        $patient->patient = Str::upper($patient->name).' '.Str::upper($patient->lastname);
        $patient->numberhistory = $patient->dni;
        $patient->ubigeo_id = ($patient->ubigeo_id == 0 ? null : $patient->ubigeo_id);
        $patient->save();

        /* ---- Guardamos las afecciones del paciente ---*/
        foreach ($afe_pac as $afe => $value){
            $patient->affections()->attach($value['id'],['state' => $value['checked']]);
        }

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
      DB::beginTransaction(); 
      $afe_pac = $request->get('afecciones');
      try {
        $rules = ['name' => 'required',
                  'lastname' => 'required'//,
                  //'dni' => 'required'
                 ];

        if($request->has('birthdate')){
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
        $patient->name = Str::upper($patient->name);
        $patient->lastname = Str::upper($patient->lastname);
        $patient->patient = Str::upper($patient->name).' '.Str::upper($patient->lastname);        
        $patient->numberhistory = $request->dni;
        $patient->ubigeo_id = ($request->ubigeo_id == 0 ? null : $request->ubigeo_id);
        $patient->save();

        if(!empty($request->get('affections'))){
            /* ---- Actualizamos las afecciones del paciente ---*/
            foreach ($afe_pac as $afe => $value){
                $patient->affections()->updateExistingPivot($value['pivot']['affection_id'], ['state' => $value['pivot']['state']]);
            }
        }else{
            /* ---- Guardamos las afecciones del paciente ---*/
            foreach ($afe_pac as $afe => $value){
                $patient->affections()->attach($value['id'],['state' => $value['checked']]);
            }
        }

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

    public function uploadPdf(Request $request){
        //dd($request->files_pdf);
        if ($request->hasFile('files_pdf')){
            $files = $request->files_pdf;
            if(!empty($files)){
                foreach($files as $file) {
                    $filename = $file->getClientOriginalName();
                    Storage::disk('public')->putFileAs('pdf' , $file , $filename);
                }
            }
            return \Response::json(array('success' => true));
        }else {
            return response()->json(
                ['status' => 'no existe Archivos Pdf para subirlos al servidor'],422
            );
        }

    }

    public function listarPDF(){
        $todos = array();
        $directory = 'pdf';
        $files = Storage::disk('public')->files($directory);
        foreach ($files as $key => $value) {
            # code...
            $pdf = array('name' => $value,
                        'size' => Storage::disk('public')->size($value),    
                        'time' => Storage::disk('public')->lastModified($value),
                        'url' => Storage::disk('public')->url($value),
                        'ruta' => Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($value)     
                        );

            array_push($todos, $pdf);
        }
        return $todos;
    }

}
