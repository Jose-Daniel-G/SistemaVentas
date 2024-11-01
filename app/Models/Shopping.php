<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;

    public function details(){
        return $this->belongsTo(DetailShopping::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function provider(){
        return $this->hasMany(Provider::class);
    }

}
