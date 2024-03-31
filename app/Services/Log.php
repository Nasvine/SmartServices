<?php

namespace App\Services;

use App\Models\Logactivity;


class Log{
    public function logactivity($data){
        return Logactivity::create($data);
      }
}