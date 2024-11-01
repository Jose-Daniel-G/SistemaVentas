<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['company', 'address', 'phone', 'email', 'name', 'cellphone'];

    // Inverse relationship with company
    public function company() {
        return $this->belongsTo(Company::class);
    }
}
