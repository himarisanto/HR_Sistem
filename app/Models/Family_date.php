<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family_date extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'mate_name',
        'child_name',
        'wedding_date',
        'wedding_certificate_number',
    ];

    function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
