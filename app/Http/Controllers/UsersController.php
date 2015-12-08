<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
//use Illuminate/Validation/Validator;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only' => ['show', 'update', 'destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usersApi'));
    }

    public function index()
    {
        //
        $users = User::get();
        //$users->role;
        //$users->reply;
         foreach ($users as $user)
        {
            //
            $user->role;
            //$user->reply;
        }

        return response()->json([
                "msg" => "Success",
                //"users" => $users->toArray()
                "users" => $users
            ], 200
        );

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
            $user = new User($request->all());


            $validator = Validator::make($user->toArray(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'id_role' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                 //return  response()->json($validator->errors()->all());
                return  response()->json($validator->messages());
            }else{
                 return ['created' => 'OK'];
            }

            //User::create($request->all());
            //return ['created' => 'El Usuario ha sido Creado.'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->user);
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

        $this->user->fill($request->all());
        $this->user->save();
         return response()->json([
                "msg" => "Success",
            ], 200
        );
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
