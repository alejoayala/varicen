<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;
use Validator;
use App\Chore;

class ChoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $chores = Chore::with('employee','user.employee')->search($request->filter,$request->search)->orderBy('id','DESC')->paginate(5);

        return [
          'pagination' => [
            'total'            => $chores->total(),
            'current_page'     => $chores->currentPage(),
            'per_page'         => $chores->perPage(),
            'last_page'        => $chores->lastPage(),
            'from'             => $chores->firstItem(),
            'to'               => $chores->lastItem(),
          ],
          'chores' => $chores
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
        $rules = ['title'       => 'required',
                  'employee_id' => 'required',
                  'description' => 'required',
                  'user_id'     => 'required'
                 ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $chore = new Chore($request->all());
        $chore->title = Str::upper($chore->title);

        $chore->save();
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
        $rules = ['title'       => 'required',
                  'employee_id' => 'required',
                  'description' => 'required',
                  'user_id'     => 'required'
                 ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $chore = Chore::find($id);
        $chore->fill($request->all());        
        $chore->title = Str::upper($chore->title);
        $chore->save();
          
        return;
      } catch (Exception $e) {         
        return response()->json(
            ['status' => $e->getMessage()], 422
        );
      }
    }

    public function updateState(Request $request, $id)
    {
        try{
            $chore = Chore::find($id);
            $chore->state = $request->state; 
            $chore->save();
            return;
        }catch (Exception $e) {         
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
        //
    }
}
