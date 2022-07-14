<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
    public function accept($id){
        $prestataire = User::find($id);
        $prestataire->roles()->updateExistingPivot($id, ['status' => 1]);
                $prestataire->save();
                return response()->json('Prestataire accepted',200);
    }
    public function refuse($id){
        $prestataire = User::find($id);
        $prestataire->roles()->updateExistingPivot($id, ['status' => 2]);
                $prestataire->save();
                return response()->json('Prestataire refused',200);
    }
}
