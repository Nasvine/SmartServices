<?php

namespace App\Models\admin\profiles;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'sexe',
        //'birth_day',phone
        'phone',
        'adress',
        'photo',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
