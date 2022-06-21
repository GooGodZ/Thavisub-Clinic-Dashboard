<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation_Types extends Model
{
    use HasFactory;
    protected $table = 'evaluation_types';
    protected $fillable = [
        'et_no',
        'name',
        'price'
    ];
}
