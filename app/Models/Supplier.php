<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
