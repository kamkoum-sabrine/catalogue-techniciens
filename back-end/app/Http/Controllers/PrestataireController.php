<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class PrestataireController extends Controller
{
    public function show(){
       
        $prestataire = User::whereHas('roles', function ($query) {
            $query->where('name', 'prestataire');
           
           
        })->with('roles')->get();
       
        
        return response()->json(
            $prestataire
        );

    }
    public function getPrestataireParSousSpecialite($id){
        $role_user = RoleUser::where('sous_specialite',$id)->with('user')->get();
        return response()->json(
            $role_user
        );
    }
    public function accept($id){
        $prestataire = User::find($id);
        $prestataire->roles()->updateExistingPivot(2, ['status' => 1]);
                $prestataire->save();
                return response()->json('Prestataire accepted',200);
    }
    public function refuse($id){
        $prestataire = User::find($id);
        $prestataire->roles()->updateExistingPivot(2, ['status' => 2]);
                $prestataire->save();
                return response()->json('Prestataire refused',200);
    }

    public function updateAccount(Request $request, $id){
        $User = User::find($id);
        if (!$User) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
        $User->update(
            [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "adresse" => $request->adresse,
                "phone_number" => $request->phone_number,
                "description" => $request->description,
                "image" => $request->image
            ]
        );
        $User->roles()->updateExistingPivot(2, ['description' => $request->description]);
        
        return response()->json(["data" => $User], 200);
    }
}
