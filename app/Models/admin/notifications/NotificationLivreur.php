<?php

namespace App\Models\admin\notifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationLivreur extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_de_notification',
        'message',
        'user_id',
        'livraison_id',
        'course_id',
        'status',
    ];
}
