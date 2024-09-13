<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->insert([
            [
                'id_number' => '1234567890',
                'full_name' => 'John Doe',
                'nickname' => 'John',
                'contract_date' => '2024-01-01',
                'work_date' => '2024-01-02',
                'work_time' => '09:00:00',
                'group' => 'A',
                'status' => 'Active',
                'position' => 'Manager',
                'nuptk' => '9876543210',
                'gender' => 'Male',
                'place_birth' => 'City A',
                'birth_date' => '1990-01-01',
                'religion' => 'Religion A',
                'email' => 'john.doe@example.com',
                'hobby' => 'Reading',
                'marital_status' => 'Married',
                'residence_address' => '123 Main St, City A',
                'phone' => '123-456-7890',
                'address_emergency' => '456 Secondary St, City B',
                'phone_emergency' => '987-654-3210',
                'blood_type' => 'O+',
                'last_education' => 'Bachelor\'s Degree',
                'agency' => 'Agency A',
                'graduation_year' => '2012',
                'competency_training_place' => 'Training Center A',
                'organizational_experience' => '5 years',
            ],
            [
                'id_number' => '0987654321',
                'full_name' => 'Jane Smith',
                'nickname' => 'Jane',
                'contract_date' => '2024-02-01',
                'work_date' => '2024-02-02',
                'work_time' => '09:00:00',
                'group' => 'B',
                'status' => 'Inactive',
                'position' => 'Assistant',
                'nuptk' => '1234567890',
                'gender' => 'Female',
                'place_birth' => 'City B',
                'birth_date' => '1992-02-01',
                'religion' => 'Religion B',
                'email' => 'jane.smith@example.com',
                'hobby' => 'Traveling',
                'marital_status' => 'Single',
                'residence_address' => '456 Another St, City B',
                'phone' => '098-765-4321',
                'address_emergency' => '789 Other St, City C',
                'phone_emergency' => '321-654-9870',
                'blood_type' => 'A+',
                'last_education' => 'Master\'s Degree',
                'agency' => 'Agency B',
                'graduation_year' => '2015',
                'competency_training_place' => 'Training Center B',
                'organizational_experience' => '3 years',
            ],
            // Add more employee records as needed
        ]);
    }
}
