<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //register
    public function register(Request $request){
       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
       ]);
       $token = $user->createToken('Token')->accessToken;
       return response()->json([
        'token' => $token,
        'user' => $user
       ],200);
    }
    //login
    public function login(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(auth()->attempt($data)){
            $name = auth()->user()->name;
            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json([
                'token' => $token,
                'name' => $name,
            ],200);
        }else{
            return response()->json(['error'=> 'unauthorixed'],401);
        }
    }
    //get the user data
    public function index(Request $request){
   $user = User::all();
        return response()->json([
            'user' => $user,
        ],200);
    }
}
