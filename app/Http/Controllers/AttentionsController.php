<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Validator;
use App\Attention;
use App\Quote;
use App\Payment;
use App\Sale;

class AttentionsController extends Controller
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
        //dd($request->attention['sale_id']);
      DB::beginTransaction();
      try {
        $rules = ['treatment' => 'required'];

        $validator = Validator::make($request->attention, $rules);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $attention = new Attention($request->attention);
        $attention->date_attention = empty($attention->date_attention) ? null : date("Y-m-d", strtotime($attention->date_attention));
        $attention->save();   
        
        /* ---- Guardamos el detalle de venta y los pagos ---*/
        foreach ($request->detalles as $key => $value) { 
            $payment = new Payment($value);
            $payment->attention_id = $attention->id;
            $payment->save();                 
        }      
        
        if($request->sale['cancelled'] == 1){
            $sale = Sale::find($request->attention['sale_id']);
            $sale->cancelled = 1;
            $sale->save();
        }

        if($request->sale['concluded'] == 1){
            $sale = Sale::find($request->attention['sale_id']);
            $sale->concluded = 1;
            $sale->save();
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
      $attention = Attention::where('quote_id',$id)->get();

      return $attention;
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

    public function list_attentions_patient($id)
    {
      /*$attentions = Attention::whereHas('quote', function ($query) use ($id) {
          $query->where('patient_id', $id);
      })->with(['quote' => function($query) use ($id){
          $query->where('patient_id','=',$id);
      },'quote.medic','quote.typetreatment'])->get();*/

      $attentions = Attention::whereHas('sale', function ($query) use ($id) {
          $query->where('patient_id', $id);
      })->with(['sale' => function($query) use ($id){
          $query->where('patient_id','=',$id);
      },'sale.employee','sale.typetreatment'])->get();

      return $attentions;
    }

}
