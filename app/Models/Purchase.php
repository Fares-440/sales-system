<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function bill()
    {
        return $this->belongsTo(PurchaseBill::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function store()
    {
        return $this->hasOne(Store::class);
    }
    public function total()
    {
        return $this->price * $this->amount;
    }
}
