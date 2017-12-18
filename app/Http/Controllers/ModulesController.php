<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        // consulto todos los parent 0
        $menus = array();
        $options = array();
        $menucompleto = array();
        $opcioncompleta = array();

        foreach ($modules as $modul) {
            if($modul->idparent == 0){
                array_push($menus,$modul);
            }
        }
        // consulto 1 a 1 los parents correspondientes a cada parent 0
        foreach ($menus as $menu) {
            foreach ($modules as $modulo) {
                if($modulo->idparent == $menu->id){
                    $option = array(
                            'name' => $modulo->name,
                            'idmenu' => $menu->id,
                            'options' => $modulo
                    );
                    array_push($options,$option);

                }
            }
        }
        // enlazamos menu - option
        foreach ($menus as $menu) {
            foreach ($options as $option) {
                if($option['idmenu'] == $menu->id){
                    array_push($opcioncompleta,$option);
                }
            }
            $mencom = array(
                'name' => $menu->name,
                'idmenu' => $menu->id,
                'options' => $opcioncompleta
            );
            $opcioncompleta = array();
            array_push($menucompleto,$mencom);
        }

        return $menucompleto;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
