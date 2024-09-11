<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Impor SoftDeletes dari namespace yang benar


class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id_number';
    protected $keyType = 'string';
    protected $fillable = [
        'id_number',
        'full_name',
        'nickname',
        'contract_date',
        'work_date',
        'work_time',
        'group',
        'status',
        'position',
        'nuptk',
        'gender',
        'place_birth',
        'birth_date',
        'religion',
        'email',
        'hobby',
        'marital_status',
        'residence_address',
        'phone',
        'address_emergency',
        'phone_emergency',
        'blood_type',
        'last_education',
        'agency',
        'graduation_year',
        'competency_training_place',
        'organizational_experience'
    ];
    protected $casts = [
        'birth_date' => 'datetime',
    ];
    function employee_record()
    {
        return $this->hasMany(Employee_record::class);
    }

    function Family_date()
    {
        return $this->hasOne(Family_date::class);
    }
    public function familyDate()
    {
        return $this->hasOne(Family_date::class, 'id_number', 'id_number');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_id', 'id_number');
    }
}
