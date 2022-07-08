<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getAll()
    {
        $roles = Role::all();
        if (empty($roles)) {
            return response()->json(['message' => 'Aucun role n est disponible! '], 404);
        }
        return response()->json($roles, 200);
    }
}
