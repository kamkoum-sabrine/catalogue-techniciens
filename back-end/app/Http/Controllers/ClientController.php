<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RendezVous;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show(){
       
        $client = User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
           
           
        })->with('roles')->get();
       
        
        return response()->json(
            $client
        );

    }
    public function ActivateAccount($id){
        $client = User::find($id);
        $client->roles()->updateExistingPivot(3, ['status' => 1]);
                $client->save();
                return response()->json('client accepted',200);
    }
    public function DesactivateAccount($id){
        $client = User::find($id);
        $client->roles()->updateExistingPivot(3, ['status' => 2]);
                $client->save();
                return response()->json('client refused',200);
    }
    public function getMyRendezVous(Request $request){
        $authUser = $request->user()->id;
        $rdv = RendezVous::where('client_id', $authUser)
        ->with('client')
        ->with('prestataire')
        ->get();
        if ($rdv){
            return response()->json(["data" => $rdv], 200);
        }
        return response()->json("Vous n'avez pas de rendez-vous ! ");

    }

}
