<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }


    public function store()
    {
        return $this->hasOne(Store::class);
    }


    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class, 'category_type', 'id');
    }
}
