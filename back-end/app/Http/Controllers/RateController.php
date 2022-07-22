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
            $rate->note = $request->input('note');
            $rate->client_id = $request->input('client_id');
            $rate->prestataire_id = $request->input('prestataire_id');
            $rate->save();  
            return response()->json(["data" => $rate], 201);
    }
 



}
