<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $fillable = [
        'ap_no',
        'date',
        'doc_id',
        'c_id'
    ];

    // N to 1
    public function cases()
    {
        return $this->belongsTo(Cases::class, 'c_id', 'id');
    }

    // N to 1
    public function doctors()
    {
        return $this->belongsTo(Doctors::class, 'doc_id', 'id');
    }
}
