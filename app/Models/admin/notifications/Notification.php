<?php

namespace App\Models\admin\notifications;

use App\Models\admin\courses\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_de_notification',
        'message',
        'user_id',
        'type_d_acteur',
        'user_receive_id',
        'livraison_id',
        'course_id',
        'status',
    ];

    public function course(){
        return $this->hasOne(Course::class);
    }

    public function client(){
        return $this->belongsTo(User::class);
    }
}
