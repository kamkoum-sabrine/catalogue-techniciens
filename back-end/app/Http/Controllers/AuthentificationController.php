<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthentificationController extends Controller
{
        public function register(RegisterRequest $request){
    
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        // dd($request->input('role'));
        // dd($user->id);
        // $role = Role::where('name','=',$request->input('role'))->get();
    //    dd($role->);
        $user_id = $user->id;
        // dd($user_id);
        $role_id = $request->input('role');
        // dd($role_id);


        $userRole = array(
            "role_id" => $role_id,
            "user_id" => $user_id,
            "specialite" => $request->input('specialite')
        );

        $user_role = RoleUser::create($userRole);
        // $user->roles()->attach($request->role, ['department' => $input['department'],'classe' => $input['classe']?$input['classe']:0]);

        
       

        return response()->json([
            'success'   => true,
            'message'   => 'User created',
            'data'      => $user
        ]);
    }

    public function login(LoginRequest $request){
        $input = $request->all();
        // dd(Auth::user());
        if (!Auth::attempt($input)) {
            return response()->json([
                'success'   => false,
                'message'   => 'Invalid credentials',
                'data'      => []
            ]);
        }
        $authUser = Auth::user();
        $user = User::where('id', '=', $authUser->id)->with('roles')->first();
        $isAdmin = false;
        $isPrestataire = false;
        $isClient = false;
        if($user->roles->contains('name','admin')){
            $isAdmin = true;
        }
        if($user->roles->contains('name','prestataire')){
            $isPrestataire = true;
            $isClient = true;
        }
        if($user->roles->contains('name','client')){
            $isClient = true;
        }
        return response()->json([
            'success'   => true,
            'token'     => Auth::user()->createToken('token')->plainTextToken,
            'user'      => $user,
            'admin'     => $isAdmin,
            'prestataire' => $isPrestataire,
            'client'      => $isClient
           

            
        ],200);
    }
    // public function getRoles($id)
    // {
    //     $roles = RoleUser::with('role')->where('user_id', $id)->get();
    //     dd($roles);
    //     $roles_array = [];
    //     $status = false;
    //     foreach ($roles as $role) {
    //         $status = $status || $role->status;
    //         $roles_array[] = ['role' => $role->role->ename,  'status' => $role->status];
    //     }
    //     return ['roles' => $roles_array, 'status' => $status];
    // }
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
