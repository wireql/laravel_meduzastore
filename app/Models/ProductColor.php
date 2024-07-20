<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
        'status',
    ];

    public function color() {
        return $this->hasOne(Color::class, 'id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_color_id');
    }
}
