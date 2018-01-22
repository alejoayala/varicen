<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
use Validator;
use App\Bell;
use App\Belldetail;

class BellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bells = Bell::whereDate('start', '>=', $request->start)->whereDate('end', '<=', $request->end)->with(['user','ubigeo','bellsdetails.employee'])->get();

        foreach ($bells as $key=>$value) {
            $bells[$key]['title'] = $bells[$key]['ubigeo']['nombre']; 
		}
        //return $quotes;
        return Response()->json($bells);
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
      DB::beginTransaction();      
      try {
        $rules = ['ubigeo_id' => 'required',
                  'start' => 'required',
                  'end' => 'required'];

        $validator = Validator::make($request->bell, $rules);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $bell = new Bell($request->bell);

        $bell->save();

        /* ---- Guardamos el detalle de campaña ---*/
        foreach ($request->detalle as $key => $value) {
            $belldet = new Belldetail();
            $belldet->employee_id = $value['value'];
            $belldet->bell_id = $bell->id;
            $belldet->save();                          
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
        $rules = ['start' => 'required',
                  'end' => 'required'];

        $validator = Validator::make($request->all(), $rules );
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $bell = Bell::find($id);
        $bell->start = $request->start;
        $bell->end = $request->end;

        $bell->save();
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
          $bell = Bell::findOrFail($id);
          $bell->delete();
      } catch (Exception $e) {
          return response()->json(
              ['status' => $e->getMessage()], 422
          );
      }
    }
}
