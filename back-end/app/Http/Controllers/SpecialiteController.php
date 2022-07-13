<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    public function getAll()
    {
        $specialites = Specialite::with("sousSpecialite")->get();
        if (empty($specialites)) {
            return response()->json(['message' => 'Aucune spécialité n est disponible! '], 404);
        }
        return response()->json($specialites, 200);
    }

    public function getSpectialiteSousSpecialite( $id){
        $specialites = Specialite::with('sousSpecialite')->find($id);
        if ($specialites){
            return response()->json([
        
                'attributes' => $specialites
            ], 201);
        } else {
            return response()->json([
                "Specialité non trouvée"
            ], 404);
        }

    }
}
