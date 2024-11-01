<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Relationship with users
    public function users(){
        return $this->hasMany(User::class);
    }

    // Relationship with providers
    public function providers() {
        return $this->hasMany(Provider::class);
    }
}

