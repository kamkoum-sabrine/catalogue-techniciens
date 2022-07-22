<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function show(){
        $rates = Rate::all();
        if (empty($rates)) {
            return response()->json(['message' => 'Aucun Rate n est disponible! '], 404);
        }
        return response()->json($rates, 200);
    }

    
}
