<?php

namespace App\Models;

use App\Models\Role;
use App\Models\RendezVous;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'cin',
        'birth_date',
        'phone_number',
        'email',
        'adresse',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withPivot(['description','status','specialite','sous_specialite','moyenne','date_dernier_paiement']);
    }
    public function client(){
        return $this->belongsToMany('App\Models\User')->withPivot(['note']);
    }
    public function prestataire()
    {
        return $this->belongsToMany(User::class)->using(Rate::class);
    }
    public function prestataireRDV()
    {
        return $this->belongsToMany(User::class)->using(RendezVous::class);
    }
    public function clientRDV()
    {
        return $this->belongsToMany(User::class)->using(RendezVous::class);
    }



    
}
