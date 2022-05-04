<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'p_no',
        'name',
        'quantity',
        'price',
        'pt_id'
    ];

    // N to 1
    public function product_types()
    {
        return $this->belongsTo(Product_Types::class, 'pt_id', 'id');
    }
}
