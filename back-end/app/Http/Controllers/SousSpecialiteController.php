<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousSpecialite;

class SousSpecialiteController extends Controller
{
    public function index($name){
        $sous_specialite = SousSpecialite::where('name', $name)->get('id');
        
        if ($sous_specialite){
            return response()->json([
        
               
                'attribute'   => $sous_specialite
            ], 201);
        } else {
            return response()->json([
                "Sous Specialité non trouvée"
            ], 404);
        }

    }
}
