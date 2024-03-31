<?php

namespace App\Services;

use App\Models\admin\notifications\NotificationLivreur;

class NotificationLivraisonCourse{

    public function notification($data){
        return NotificationLivreur::create($data);
    }
}