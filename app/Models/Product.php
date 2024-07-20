<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desctiprion',
        'main_image',
        'price',
        'old_price',
        'status',
    ];

    public function attrs() {
        return $this->hasMany(AttrValue::class, 'product_id');
    }

    public function colors() {
        return $this->hasMany(ProductColor::class, 'product_id');
    }
}