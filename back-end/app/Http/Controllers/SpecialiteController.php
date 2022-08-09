<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;
use App\Http\Requests\SpecialiteRequest;

class SpecialiteController extends Controller
{
    public function getAll()
    {
        $specialites = Specialite::with("sousSpecialites")->get();
        if (empty($specialites)) {
            return response()->json(['message' => 'Aucune spécialité n est disponible! '], 404);
        }
        return response()->json($specialites, 200);
    }

    public function getSpectialiteSousSpecialite( $id){
        $specialites = Specialite::with('sousSpecialites')->find($id);
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
    public function find($name){
        $specialite = Specialite::where('name', $name)->get('id');
        
        if ($specialite){
            return response()->json([
        
               
                'attribute'   => $specialite
            ], 201);
        } else {
            return response()->json([
                " Specialité non trouvée"
            ], 404);
        }

    }

    public function create(SpecialiteRequest $request){
        $specialite = Specialite::create(
            [
                "name" => $request->name,
            ]
        );
        return response()->json(["data" => $specialite], 201);

    }
    
    public function update(SpecialiteRequest $request, $id){
        $Specialite = Specialite::find($id);
        if (!$Specialite) {
            return response()->json([
                "message" => "Specialite not found"
            ], 404);
        }
        $Specialite->update(
            [
                "name" => $request->name,
            ]
        );
        return response()->json(["data" => $Specialite], 200);
    }

    public function delete($id){
        $Specialite = Specialite::find($id);
        if (!$Specialite) {
            return response()->json([
                'type' => 'Specialite',
                'message' => 'Specialite non trouvée'
            ], 404);
        }
        $Specialite->delete();
        return response()->json([], 200);
    }
}
