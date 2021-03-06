<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD

    public function __construct(){
        $this->middleware('cors');
=======
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only' => ['show', 'update', 'destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usersApi'));
    }

    //funcion para de los usuarios solo los campos deseados
    public function indexSec()
    {
        $users = \DB::table('users')
            ->select('users.id','users.name','users.email','role.name as role_name')
            ->join('role', 'users.id_role', '=', 'role.id')
            ->get();

        //dd($result);
        return response()->json([
                "msg" => "Success",
                //"users" => $users->toArray()
                "users" => $users
            ], 200
        );
>>>>>>> control2/master
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
<<<<<<< HEAD

        $user = User::create($request->all());
        $user->remember_token = str_random(10);

        $user->save();

        //User::create($request->all());

        return response()->json(["mensaje"=>"Usuario Creado"]);
=======
            $user = new User($request->all());


            $validator = Validator::make($user->toArray(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'id_role' => 'required|numeric|exists:role,id'
            ]);

            if ($validator->fails()) {
                 //return  response()->json($validator->errors()->all());
                return  response()->json($validator->messages());
            }

            User::create($request->all());
            return ['created' => 'OK'];
>>>>>>> control2/master
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

            $user = new User($request->all());


            $validator = Validator::make($user->toArray(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' .$id,
                'id_role' => 'required|numeric|exists:role,id'
            ]);


            if ($validator->fails()) {
                return  response()->json($validator->messages());
            }

            $this->user->fill($request->all());
            $this->user->save();

            return ['created' => 'OK'];


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
        $this->user->delete();
        return ['deleted' => 'OK'];
    }
}
