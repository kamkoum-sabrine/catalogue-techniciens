<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $fillable = [
        "client_id",
        "prestataire_id",
        "date_rdv",
        "status"

    ];
    public function prestataire(){
        return $this->hasOne(User::class,'id','prestataire_id');
    }
    public function client(){
        return $this->hasOne(User::class,'id','client_id');
    }

}
