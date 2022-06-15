<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'or_no',
        'name',
        'status',
        'sup_id'
    ];

    public function suppliers()
    {
        return $this->belongsTo(Suppliers::class, 'sup_id', 'id');
    }
}
