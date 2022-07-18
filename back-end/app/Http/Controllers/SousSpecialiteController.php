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

}
