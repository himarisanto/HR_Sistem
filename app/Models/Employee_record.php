<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_record extends Model
{
    use HasFactory;

    protected $table = 'employee_records';


    protected $primaryKey = 'id';
    protected $keyType = 'int';

  
    protected $fillable = [
        'id_number',
        'offense_type',
        'offense_date',
        'description',
    ];

    protected $casts = [
        'offense_date' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_number', 'id_number');
    }
}
