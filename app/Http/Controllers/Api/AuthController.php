<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $request->validate([
            
            'email'=>'required|string',
            'password'=>'required|string|confirmed'  
        ]);
        $credentials=request(['email','password']);
        if(!Auth::attempt($credentials)){
            return response()->json([
                'msg'=>'invalid credentials'
            ],401);
        }

        $user =$request->user();

        $token=$user->createToken('Access Token');
        $user->access_token=$token->accessToken;

        return response()->json([
            "user"=>$user
        ],200);
    }
    public function signup(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string|confirmed'  
        ]);

        $user=new User([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        $user->save();
        return response()->json([
                    "message"=>"user registered successfully"
        ]);

    }  
    public function index(){
        echo "hello world called";
    }
}
