<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy_Details extends Model
{
    use HasFactory;
    protected $table = 'buy_details';
    protected $fillable = [
        'bd_no',
        'quantity',
        'price',
        'p_id',
        'buy_id'
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'p_id', 'id');
    }
}
