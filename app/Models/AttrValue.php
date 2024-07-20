<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttrValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'attr_id',
        'product_id',
    ];

    public function attr() {
        return $this->hasOne(Attr::class, 'id');
    }
}