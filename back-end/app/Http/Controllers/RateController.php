<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use App\Http\Requests\RateRequest;

class RateController extends Controller
{
    public function show(){
        $rates = Rate::all();
        if (empty($rates)) {
            return response()->json(['message' => 'Aucun Rate n est disponible! '], 404);
        }
        return response()->json($rates, 200);
    }

    public function create(RateRequest $request){

            $rate = new Rate();
        // $idClient = $request->user()->id; 
        // dd($idClient);
            $rate->note = $request->input('note');
            $rate->client_id = $request->user()->id;
            $rate->prestataire_id = $request->input('prestataire_id');
            $rate->save();  
            return response()->json(["data" => $rate], 201);
    }

    public function update(RateRequest $request, $id){

        $Rate = Rate::find($id);
        if (!$Rate) {
            return response()->json([
                "message" => " Note not found"
            ], 404);
        }
        $Rate->update(
            [
                "note" => $request->note,
            ]
        );
        return response()->json(["data" => $Rate], 200);
    }

    public function delete($id){
        $Rate = Rate::find($id);
        if (!$Rate) {
            return response()->json([
                'type' => 'Rate',
                'message' => 'Note non trouvée'
            ], 404);
        }
        $Rate->delete();
        return response()->json([], 200);
    }
 



}
