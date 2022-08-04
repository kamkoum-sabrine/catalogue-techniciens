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
   
        $user_id = $user->id;
    
        $role_id = $request->input('role');
     


        $userRole = array(
            "role_id" => $role_id,
            "user_id" => $user_id,
            "specialite" => $request->input('specialite'),
            "sous_specialite" => $request->input('sous_specialite')
        );

        $user_role = RoleUser::create($userRole);
             if ($user_role->role_id==3){
            $user->roles()->updateExistingPivot(3, ['status' => 1]);
           

        }
    
        return response()->json([
            'success'   => true,
            'message'   => 'User created',
            'data'      => $user
        ]);
    }

    public function login(LoginRequest $request){
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $user = User::where('id', '=', $authUser->id)->with('roles')->first();
            if (
                $user->roles->contains('name', "prestataire")
            ) {
                if ($user->roles->where('name', 'prestataire')->first()->pivot->status == 0) {
                    return $this->sendError('Unauthorised.', ['error' => 'Votre compte n\'est pas encore activé']);
                }else if ($user->roles->where('name', 'prestataire')->first()->pivot->status == 2) {
                    return $this->sendError('Unauthorised.', ['error' => 'Votre compte n\'est pas activé']);
                }
            }
            if (
                $user->roles->contains('name', "client")
            ) {
                if ($user->roles->where('name', 'client')->first()->pivot->status == 0) {
                    return $this->sendError('Unauthorised.', ['error' => 'Votre compte n\'est pas encore activé']);
                }else if ($user->roles->where('name', 'client')->first()->pivot->status == 2) {
                    return $this->sendError('Unauthorised.', ['error' => 'Votre compte n\'est pas activé']);
                }
            }
           
            
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;
            $success['user'] = $user;
            $success['isAdmin'] = false;
            $success['isPrestataire'] = false;
            $success['isClient'] = false;

            if ($user->roles->contains('name', "prestataire")) {
                $success['isPrestataire'] = true;
                $success['isClient'] = true;
            } else if ($user->roles->contains('name', "admin")) {
                $success['isAdmin'] = true;
            }
           
            if ($user->roles->contains('name', "client")) {
                $success['isClient'] = true;
            }
           
            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Merci de verifier vos identifiants']);
        }
        // }
        
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
