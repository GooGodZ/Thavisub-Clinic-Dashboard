<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
        'pt_no',
        'name',
        'age',
        'tel'
    ];

    // 1 to N
    public function cases()
    {
        return $this->hasMany(Cases::class, 'pt_id', 'id');
    }
}
