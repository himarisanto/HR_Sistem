<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigInteger('id_number')->primary();
            $table->string('full_name');
            $table->string('nickname');
            $table->date('contract_date');
            $table->date('work_date');
            $table->enum('work_time', ['Magang', 'kontrak', 'Tetap']);
            $table->string('group')->nullable();
            $table->enum('status', ['Aktif', 'Berhenti']);
            $table->string('position');
            $table->string('nuptk')->nullable();
            $table->enum('gender', ['pria', 'wanita']);
            $table->string('place_birth');
            $table->date('birth_date');
            $table->string('religion');
            $table->string('email')->unique();
            $table->string('hobby')->nullable();
            $table->enum('marital_status', ['menikah', 'belum']);
            $table->string('residence_address');
            $table->string('phone');
            $table->string('address_emergency')->nullable();
            $table->string('phone_emergency')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('last_education')->nullable();
            $table->string('agency')->nullable();
            $table->integer('graduation_year')->nullable();
            $table->string('competency_training_place')->nullable();
            $table->text('organizational_experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
