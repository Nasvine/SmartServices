<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\admin\notes\Note;
use App\Models\admin\roles\Role;
use Laravel\Sanctum\HasApiTokens;
use App\Models\admin\courses\Course;
use App\Models\admin\livreurs\Livreur;
use App\Models\admin\profiles\Profile;
use App\Models\admin\commandes\Commande;
use Illuminate\Notifications\Notifiable;
use App\Models\admin\livraisons\Livraison;
use App\Models\admin\notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //'name',
        'email',
        'role_id',
        'password',
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

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function note(){
        return $this->hasOne(Note::class);
    }

    public function livreur(){
        return $this->hasOne(Livreur::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function livraisons(){
        return $this->hasMany(Livraison::class);
    }

    public function hasPermission($name){
        return $this->role->permissions()->where('name', $name)->exists();
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id', 'user_receive_id');
    }
}
