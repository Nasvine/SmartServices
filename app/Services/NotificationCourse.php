<?php

namespace App\Services;

use App\Models\admin\notifications\Notification;

class NotificationCourse{

    public function notification($data){
        return Notification::create($data);
    }
}