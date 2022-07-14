<?php

namespace App\Models;

use App\Models\User;
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
}
