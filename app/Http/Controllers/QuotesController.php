<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Validator;
use App\Quote;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::orderBy('datequotes','ASC')->get(['id','datequotes','hourini AS start','hourfin AS end','patient_id','medic_id','typetreatment_id']);
        $quotes->each(function($quotes){
            $quotes->title = $quotes->patient->patient;
            $quotes->medic;
            $quotes->typetreatment;
        });
        return $quotes;
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
      try {
        $rules = ['patient_id' => 'required',
                  'medic_id' => 'required',
                  'typetreatment_id' => 'required',
                  'employee_id' => 'required',
                  'hourini' => 'required',
                  'hourfin' => 'required'];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $quote = new Quote($request->all());

        $quote->save();
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
      if($id){
        $quote = Quote::where('medic_id',$id)->orderBy('datequotes','ASC')->get();
      }else{
        $quote = Quote::orderBy('date','ASC')->get();
      }

      $quote->each(function($quote){
          $quote->patient;
          $quote->employee;
          $quote->statusquo;
          $quote->medic;
          $quote->typetreatment;
      });
      return $quote;
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
          $quote = Quote::findOrFail($id);
          $quote->delete();
      } catch (Exception $e) {
          return response()->json(
              ['status' => $e->getMessage()], 422
          );
      }
    }
}
