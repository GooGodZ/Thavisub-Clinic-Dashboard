<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'od_no',
        'quantity',
        'p_id',
        'or_id'
    ];
}
