<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_record extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'offense_type',
        'offense_date',
        'description'
    ];

    function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
