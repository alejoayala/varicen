<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
use Validator;
use App\Profile;
use App\Module;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::with('modules')->get();          
        return $profiles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return Profile::find(2)->modules()->where('module_profile.state',1)->get();
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
      $modules = Module::all();
      try {
        $rules = ['name' => 'required'];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        /*-- validacion por nombres y apellidos --*/
        $var_pro = Str::upper($request->get('name'));
        $profile = Profile::where('name',$var_pro)->count();
        if($profile > 0){
            return response()->json(['errors'=>['PROFILE ' => 'Ya existe un perfil con estos datos : '.$request->get('name')]]);
        }        

        $profile = new Profile($request->all());

        $profile->name = Str::upper($profile->name);
        $profile->save();

        /* ---- Guardamos los modulos del perfil ---*/
        foreach ($modules as $key => $value){
            $profile->modules()->attach($value['id'],['state' => 0]);
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
        // funcion para recuperar los items del menu por perfil
        //return Profile::find($id)->modules()->where('module_profile.state',1)->get();
        $modules = Profile::find($id)->modules()->where('module_profile.state',1)->get();
        //$modules = Module::all();               // cargo todos los modulos de la BD        
        $menus = array();
        $options = array();
        $suboptions = array();
        $content =  array();
        $menucompleto = array();
        $opcioncompleta = array();
        // consulto todos los parent 0
        foreach ($modules as $modul) {
            if($modul->idparent == 0){
                array_push($menus,$modul);      // cargo todos los parent 0 en el array $menus
            }
        }
        // consulto 1 a 1 los parents correspondientes a cada parent 0
        foreach ($menus as $menu) {
            foreach ($modules as $modulo) {
                if($modulo->idparent == $menu->id){
                    $option = array(
                            'name'          => $modulo->name,
                            'id'            => $modulo->id,
                            'idmenu'        => $menu->id,
                            'icono'         => $modulo->icono,
                            'name_router'   => $modulo->name_router,
                            'name_template' => $modulo->name_template,
                            'bloque'        => $modulo->bloque,
                            'options'       => $modulo
                    );
                    array_push($options,$option);       // cargo los hijos de cada parent 0 en el array $options

                }
            }
        }
        // consulto 1 a 1 si los hijos tiene mas desendientes
        foreach ($options as $subope) {
            foreach ($modules as $mod) {
                if($subope['options']->id == $mod->idparent){
                    $sub = array(
                        'name'          => $subope['name'] ,
                        'idoption'      => $subope['options']->id,
/*                         'icono'         => $subope['options']->icono,
                        'name_router'   => $subope['options']->name_router,
                        'name_template' => $subope['options']->name_template,   */                      
                        'options'       => $mod
                    );
                    array_push($suboptions,$sub);   // lo cargo en el array $suboptions
                }
            }
        }

        // enlazamos menu - option
        foreach ($menus as $menu) {
            foreach ($options as $option) {
                if($option['idmenu'] == $menu->id){
                    foreach ($suboptions as $sop) {     // enlazamos opciones con subopciones
                        if($option['options']->id == $sop['idoption']){
                            array_push($content,$sop);
                        }
                    }   
                    $men_sub = array(
                            'name'          => $option['name'],
                            'id'            => $option['id'],
                            'icono'         => $option['icono'],
                            'name_router'   => $option['name_router'],
                            'name_template' => $option['name_template'],
                            'bloque'        => $option['bloque'],
                            'options'       => $option,
                            'suboptions'    => $content
                    );                 
                    array_push($opcioncompleta,$men_sub);
                    $content = array();
                }

            }
            $mencom = array(
                'name'          => $menu->name,
                'idmenu'        => $menu->id,
                'icono'         => $menu->icono,
                'name_router'   => $menu->name_router,
                'name_template' => $menu->name_template,
                'menu_internal' => $menu->menu_internal,
                'bloque'        => $menu->bloque,
                'options'       => $opcioncompleta
            );
            $opcioncompleta = array();
            array_push($menucompleto,$mencom);
        }

        return $menucompleto;

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
        $profile = Profile::find($id); 
        $modules = Module::all();
        foreach ($modules as $mod => $value){
            $profile->modules()->updateExistingPivot($value['id'], ['state' => 0]);
        }        
        foreach ($modules as $mod => $value) {
            # code...
            foreach ($request->checkedProfile as $valmod) {
                # code...
                if($value['id'] == $valmod ){
                    $profile->modules()->updateExistingPivot($value['id'], ['state' => 1]);
                }
                if($valmod == 27){
                    $profile->modules()->updateExistingPivot(30, ['state' => 1]);
                    $profile->modules()->updateExistingPivot(31, ['state' => 1]);
                }

            }

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
        //
    }

}
