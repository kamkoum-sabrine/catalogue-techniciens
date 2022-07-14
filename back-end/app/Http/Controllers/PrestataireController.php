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
}
