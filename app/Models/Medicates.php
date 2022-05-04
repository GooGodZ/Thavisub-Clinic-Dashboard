<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicates extends Model
{
    use HasFactory;
    protected $table = 'medicates';
    protected $fillable = [
        'm_no',
        'quantity',
        'price',
        'date',
        'p_id',
        'c_id'
    ];
}
