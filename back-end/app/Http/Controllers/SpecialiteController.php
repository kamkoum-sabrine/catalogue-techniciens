<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    public function getAll()
    {
        $specialites = Specialite::all();
        if (empty($specialites)) {
            return response()->json(['message' => 'Aucune spécialité n est disponible! '], 404);
        }
        return response()->json($specialites, 200);
    }
}
