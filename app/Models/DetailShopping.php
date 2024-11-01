<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailShopping extends Model
{
    use HasFactory;

    public function shopping()
    {
        return $this->belongsTo(Shopping::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
