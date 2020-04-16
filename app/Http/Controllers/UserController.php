<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    // VALIDACIÔN DE AUTENTICACIÔN EN LA RUTA= web.php
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index(){
        $users = User::first()
        ->orderBy('id', 'desc')
        ->get();
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function store(UserRequest $request){

        // REEMPLAZADO POR INCLUSIÔN DE UN REQUESTS = UserRequest
        // $request->validate([
        //     'name'      => 'required',
        //     'email'     => ['email', 'required', 'unique:users'],
        //     'password'  => ['required', 'min:8']
        // ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return back();
    }

    public function destroy(User $user){
        $user->delete();

        return back();
    }
}