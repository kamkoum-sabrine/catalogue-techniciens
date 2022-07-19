<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
