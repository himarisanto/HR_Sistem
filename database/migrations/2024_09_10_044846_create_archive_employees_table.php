<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchiveEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('archive_employees', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->unique();
            $table->string('full_name');
            $table->string('nickname')->nullable();
            $table->date('contract_date')->nullable();
            $table->date('work_date')->nullable();
            $table->string('work_time')->nullable();
            $table->string('group')->nullable();
            $table->string('status')->nullable();
            $table->string('position')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('gender')->nullable();
            $table->string('place_birth')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('religion')->nullable();
            $table->string('email')->nullable();
            $table->string('hobby')->nullable();
            $table->string('marital_status')->nullable();
            $table->text('residence_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('address_emergency')->nullable();
            $table->string('phone_emergency')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('last_education')->nullable();
            $table->string('agency')->nullable();
            $table->string('graduation_year')->nullable();
            $table->string('competency_training_place')->nullable();
            $table->string('organizational_experience')->nullable();
            $table->string('mate_name')->nullable();
            $table->string('child_name')->nullable();
            $table->date('wedding_date')->nullable();
            $table->string('wedding_certificate_number')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('archive_employees');
    }
}
