<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = [
        'doc_no',
        'name',
        'dob',
        'gender',
        'address',
        'tel',
        'status',
    ];

    // 1 to N
    public function cases()
    {
        return $this->hasMany(Cases::class, 'doc_id', 'id');
    }
}
