<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buys extends Model
{
    use HasFactory;
    protected $table = 'buys';
    protected $fillable = [
        'buy_no',
        'date',
        'or_id'
    ];
}
