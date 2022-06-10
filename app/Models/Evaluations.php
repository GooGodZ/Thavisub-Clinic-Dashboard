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
        'status',
        'c_id',
        'et_id'
    ];

    // N to 1
    public function evaluation_types()
    {
        return $this->belongsTo(Evaluation_Types::class, 'et_id', 'id');
    }

    // N to 1
    public function cases()
    {
        return $this->belongsTo(Cases::class, 'c_id', 'id');
    }
}
