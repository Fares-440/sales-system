<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseBill extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
