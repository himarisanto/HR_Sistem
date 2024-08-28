<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $primaryKey = 'id_number';  // Tetap di sini jika Anda menggunakan 'id_number' sebagai primary key
    protected $fillable = ['employee_id', 'date', 'status'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id_number');
    }
}
