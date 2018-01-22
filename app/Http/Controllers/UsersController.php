<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Exception;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::search($request->user_name)->with('employee','employee.charge','employee.profile')->where('active',1)->orderBy('id','DESC')->paginate(5);

        $users->each(function($users){
            $users->access = ($users->employee->enabled == 1 ? true : false);
        });
        return [
          'pagination' => [
            'total'            => $users->total(),
            'current_page'     => $users->currentPage(),
            'per_page'         => $users->perPage(),
            'last_page'        => $users->lastPage(),
            'from'             => $users->firstItem(),
            'to'               => $users->lastItem(),
          ],
          'users' => $users
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
        try
        {
            $rules = ['antPass' => 'required',
                    'newPass' => 'required',
                    'repPass' => 'required'
                    ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['errors'=>$validator->errors()]);
            }       
            if($request->newPass != $request->repPass){
                return response()->json(['errors'=>'La nueva clave y la repeticion de clave no son iguales']);                
            }    
            $input = $request->all();
            $user = User::find(auth()->user()->id);     
            //dd($input['antPass']); 
            
            if (Hash::check($input['antPass'], $user->password))
            {
                $newPw = $input['newPass'];
                //$user = User::find($id);
                $user->password = bcrypt($newPw);
                $user->save();

                DB::commit();           
                return;
            }else{
                return response()->json(['errors'=>'La clave actual no es correcta']);                                
            }
        } catch (Exception $e) {
            DB::rollback();          
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
            $user = User::findOrFail($id);
            $user->active = 0;
            $user->save();
        } catch (Exception $e) {
            return response()->json(
                ['status' => $e->getMessage()], 422
            );
        }
    }
}
