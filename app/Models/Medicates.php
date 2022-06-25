<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicates extends Model
{
    use HasFactory;
    protected $table = 'medicates';
    protected $fillable = [
        'quantity',
        'price',
        'take',
        'date',
        'p_id',
        'c_id'
    ];

    // N to 1
    public function cases()
    {
        return $this->belongsTo(Cases::class, 'c_id', 'id');
    }

    // N to 1
    public function products()
    {
        return $this->belongsTo(Products::class, 'p_id', 'id');
    }

    public function setTakeAttribute($value)
    {
        $this->attributes['take'] = json_encode($value);
    }

    public function getTakeAttribute($value)
    {
        return $this->attributes['take'] = json_decode($value);
    }
}
