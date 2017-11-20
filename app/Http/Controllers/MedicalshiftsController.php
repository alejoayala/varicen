<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalShift;

class MedicalshiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $days = $request->get('day');
        foreach ($days as $dia) {
          $medshift = MedicalShift::where('day',$dia)->where('employee_id',$request->get('employee_id'))->delete();

          $medicalshift = new MedicalShift();
          $medicalshift->employee_id = $request->get('employee_id');
          $medicalshift->day = $dia ;
          $medicalshift->hourini1_id = $request->get('hourini1_id');
          $medicalshift->hourfin1_id = $request->get('hourfin1_id');
          $medicalshift->hourini2_id = $request->get('hourini2_id');
          $medicalshift->hourfin2_id = $request->get('hourfin2_id');
          $medicalshift->save();
          //return;
        }
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $medicalshift = Medicalshift::where('employee_id',$id)->orderBy('day','ASC')->get();

      $medicalshift->each(function($medicalshift){
          $medicalshift->hourini1;
          $medicalshift->hourfin1;
          $medicalshift->hourini2;
          $medicalshift->hourfin2;
      });
      return $medicalshift;
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
      try {
          $medicalshift = Medicalshift::findOrFail($id);
          $medicalshift->delete();
      } catch (Exception $e) {
          return response()->json(
              ['status' => $e->getMessage()], 422
          );
      }
    }

}
