<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Attention;

class PdfController extends Controller
{
  public function invoice(Request $request)
  {
      //dd($request->id);
      $data = $this->getData($request->id);
      //dd($data);
      $date = date('Y-m-d');
      $invoice = "2222";
      $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('invoice');
  }

  public function getData($id)
  {

      /*$data =  [
          'quantity'      => '1' ,
          'description'   => 'some ramdom text',
          'price'   => '500',
          'total'     => '500'
      ];*/

      $data = Attention::whereHas('quote', function ($query) use ($id) {
          $query->where('patient_id', $id);
      })->with(['quote' => function($query) use ($id){
          $query->where('patient_id','=',$id);
      },'quote.medic','quote.typetreatment'])->get();

      return $data;

  }
}
