<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Validator;
use App\ExchangeRate;

class ExchangeratesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchangerates = ExchangeRate::orderBy('id','DESC')->paginate(5);

        $exchangerates->each(function($exchangerates){
            $exchangerates->user;
        });

        return [
          'pagination' => [
            'total'            => $exchangerates->total(),
            'current_page'     => $exchangerates->currentPage(),
            'per_page'         => $exchangerates->perPage(),
            'last_page'        => $exchangerates->lastPage(),
            'from'             => $exchangerates->firstItem(),
            'to'               => $exchangerates->lastItem(),
          ],
          'exchangerates' => $exchangerates
        ];

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
        $rules = ['valor' => 'required'];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $exchangerate = new ExchangeRate($request->all());

        $exchangerate->save();
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
        $rules = ['valor' => 'required'];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $exchange = ExchangeRate::find($id);
        $exchange->valor = $request->valor;
        $exchange->save();
          
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
            $exchange = ExchangeRate::findOrFail($id);
            $exchange->valor = "0";
            $exchange->save();
            return;
        } catch (Exception $e) {
            return response()->json(
                ['status' => $e->getMessage()], 422
            );
        }
    }
}
