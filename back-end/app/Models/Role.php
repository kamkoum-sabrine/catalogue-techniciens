<?php

namespace App\Models;

use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class)->using(RoleUser::class);
    }
    public function RoleUser()
    {
        return $this->hasOne(RoleUser::class, 'role_id', 'id');
        // return $this->hasMany('App\Models\RoleUser','role_id','id');

    }
}
