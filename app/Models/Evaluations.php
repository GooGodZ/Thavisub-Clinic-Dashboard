<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    use HasFactory;
    protected $table = 'evaluations';
    protected $fillable = [
        'eva_no',
        'date',
        'detail',
        'c_id',
        'et_id'
    ];
}
