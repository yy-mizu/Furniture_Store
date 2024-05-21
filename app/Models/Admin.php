<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
class Admin extends Authenticable
{
    use HasFactory;
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}

