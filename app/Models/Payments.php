<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'pay_no',
        'price_p',
        'price_e',
        'total',
        'date',
        'c_id'
    ];
}
