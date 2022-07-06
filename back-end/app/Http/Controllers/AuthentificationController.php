<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthentificationController extends Controller
{
        public function register(RegisterRequest $request){
        $input = $request->all();
        $user = User::create($input);
        return response()->json([
            'success'   => true,
            'message'   => 'User created',
            'data'      => $user
        ]);
    }

    public function login(LoginRequest $request){
        $input = $request->all();
        if (!Auth::attempt($input)) {
            return response()->json([
                'success'   => false,
                'message'   => 'Invalid credentials',
                'data'      => []
            ]);
        }

        return response()->json([
            'success'   => true,
            'token'     => Auth::user()->createToken('token')->plainTextToken,
            'user'      => Auth::user()
        ],200);
    }
    
    public function unique($field){
        $user = User::where('email', $field)->first();
        $user1 = User::where('cin', $field)->first();
        if($user || $user1){
            return response()->json([
                'success'   => false,
                'message'   => 'User already exists',
                'data'      => []
            ],201);
        }else{
            return response()->json([
                'success'   => true,
                'message'   => 'User not exists',
                'data'      => []
            ]);
        }

    }

}
