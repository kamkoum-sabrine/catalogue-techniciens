<?php

namespace App\Models;

use App\Models\SousSpecialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialite extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function sousSpecialite()
    {
        return $this->hasMany(SousSpecialite::class, "specialite_id", "id");
    }


}
