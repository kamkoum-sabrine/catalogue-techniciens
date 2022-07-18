<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;
use App\Models\SousSpecialite;
use App\Http\Requests\SousSpecialiteRequest;

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

    public function getAll() {
        $sous_specialite = SousSpecialite::with('specialite')->get();
        if (empty($sous_specialite)) {
            return response()->json(['message' => 'Aucune sous specialité n est disponible! '], 404);
        }
        return response()->json($sous_specialite, 200);
    }
    public function findSousSpecialite($id){
        $sous_specialite = SousSpecialite::find($id);
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
    public function create(SousSpecialiteRequest $request){

        // $nameSpecialite = $request->input('specialite');
        
        $sous_specialite = new SousSpecialite();
        $sous_specialite->name = $request->input('name');
        $sous_specialite->specialite_id = $request->input('specialite_id');
        

        $sous_specialite->save();
        // $sousSpecialite = SousSpecialite::create(
        //     [
        //         "name" => $request->input('specialite'),
        //         "specialite_id" => $request->input('specialite_id')
        //     ]
        // );
        return response()->json(["data" => $sous_specialite], 201);

    }
    public function update(SousSpecialiteRequest $request, $id){
        $SousSpecialite = SousSpecialite::find($id);
        if (!$SousSpecialite) {
            return response()->json([
                "message" => " Sous Specialite not found"
            ], 404);
        }
        $SousSpecialite->update(
            [
                "name" => $request->name,
            ]
        );
        return response()->json(["data" => $SousSpecialite], 200);
    }
    public function delete($id){
        $SousSpecialite = SousSpecialite::find($id);
        if (!$SousSpecialite) {
            return response()->json([
                'type' => 'SousSpecialite',
                'message' => 'Specialite non trouvée'
            ], 404);
        }
        $SousSpecialite->delete();
        return response()->json([], 200);
    }


}
