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
        Schema::create('employee_records', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->bigInteger('id_number'); // Foreign key for employees table
            $table->string('offense_type');
            $table->date('offense_date');
            $table->text('description')->nullable();
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('id_number')->references('id_number')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_records');
    }
};
