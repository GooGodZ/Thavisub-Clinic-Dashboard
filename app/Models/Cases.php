<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $table = 'cases';
    protected $fillable = [
        'c_no',
        'date',
        'pressure',
        'temper',
        'respira',
        'pulse',
        'disea',
        'pt_id',
        'doc_id'
    ];

    // N to 1
    public function patients()
    {
        return $this->belongsTo(Patients::class, 'pt_id', 'id');
    }

    // N to 1
    public function doctors()
    {
        return $this->belongsTo(Doctors::class, 'doc_id', 'id');
    }
}
