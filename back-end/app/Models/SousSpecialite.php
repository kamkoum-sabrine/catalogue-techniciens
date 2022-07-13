<?php

namespace App\Models;

use App\Models\Specialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SousSpecialite extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function specialite(){
        return $this->hasOne(Specialite::class,'id','specialite_id');
    }


}
