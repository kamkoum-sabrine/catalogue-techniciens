<?php

namespace App\Models;

use App\Models\User;
use App\Models\Specialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleUser extends Pivot
{
     use HasFactory;
    public $timestamps = false;
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function specialite(){
        return $this->hasOne(Specialite::class,'id','specialite');
    }
    public function sous_specialite(){
        return $this->hasOne(SousSpecialite::class,'id','sous_specialite');
    }
}
