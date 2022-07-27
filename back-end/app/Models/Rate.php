<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        "client_id",
        "prestataire_id",
        "note"

    ];
    public function prestataire(){
        return $this->hasOne(User::class,'id','prestataire');
    }
    public function client(){
        return $this->hasOne(User::class,'id','client');
    }
}
