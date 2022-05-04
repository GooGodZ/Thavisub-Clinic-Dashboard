<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Types extends Model
{
    use HasFactory;
    protected $table = 'product_types';
    protected $fillable = [
        'pt_no',
        'name',
    ];

    // 1 to N
    public function products()
    {
        return $this->hasMany(Products::class, 'pt_id', 'id');
    }
}
