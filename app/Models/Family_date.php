<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family_date extends Model
{
    use HasFactory;


    protected $table = 'family_dates'; // Nama tabel di database
    protected $primaryKey = 'id_number'; // Kunci utama jika berbeda dari id
    public $incrementing = false; // Jika kunci utama bukan auto increment
    protected $fillable = [
        'id_number',
        'mate_name',
        'child_name',
        'wedding_date',
        'wedding_certificate_number'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_number', 'id_number');
    }
}
