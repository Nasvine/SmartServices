<?php

namespace App\Models\admin\roles;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\permissions\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
}
