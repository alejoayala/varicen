<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
use Validator;
use App\Sale;
use App\Attention;
use App\Saledetail;
use App\Payment;

class SalesController extends Controller
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
        //dd($request);
        DB::beginTransaction();    

        try {
            $rules_sale = ['date_sale'          => 'date_format:Y-m-d',
                           'typetreatment_id'   => 'required',
                           'patient_id'         => 'required',
                           'employee_id'        => 'required',
                           'user_id'            => 'required'
                          ];

            $rules_attention = ['date_attention'    => 'date_format:Y-m-d',
                           'type'                   => 'required',
                           'treatment'              => 'required',
                           'employee_id'            => 'required'
                          ];                                                 

            $messages_sale = ['date_sale.date_format' => 'Formato de fecha invalido'];
            $messages_attention = ['date_attention.date_format' => 'Formato de fecha invalido'];

            $validator = Validator::make($request->sale, $rules_sale , $messages_sale);
            if ($validator->fails()) {
                return response()->json(['errors'=>$validator->errors()]);
            }

            $validator2 = Validator::make($request->attention, $rules_attention , $messages_attention);
            if ($validator2->fails()) {
                return response()->json(['errors'=>$validator2->errors()]);
            }            
            /*-- Grabamos la Venta ---*/
            $sale = new Sale($request->sale);
            $sale->date_sale = empty($sale->date_sale) ? null : date("Y-m-d", strtotime($sale->date_sale));
            $sale->save();

            /*-- Grabamos la Atencion ---*/
            $attention = new Attention($request->attention);
            $attention->date_attention = empty($attention->date_attention) ? null : date("Y-m-d", strtotime($attention->date_attention));
            $attention->sale_id = $sale->id;
            $attention->save();            

            /* ---- Guardamos el detalle de venta y los pagos ---*/
            foreach ($request->detalles as $key => $value) {
                $saledet = new Saledetail($value);
                $saledet->sale_id = $sale->id;
                $saledet->save();  
                
                $payment = new Payment($value);
                $payment->saledetail_id = $saledet->id;
                $payment->attention_id = $attention->id;
                $payment->save();                 
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

    public function list_sales_patient($id)
    {
        $sales = Sale::with('attentions','attentions.payments','employee','typetreatment','salesdetails.payments','salesdetails.product')->where('patient_id',$id)->get();
        return $sales;
    }
}
