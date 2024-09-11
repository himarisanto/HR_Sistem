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
        Schema::table('employee_records', function (Blueprint $table) {
            $table->boolean('followed_up')->default(false); // Kolom baru untuk menandai follow-up
            $table->date('followup_date')->nullable(); // Kolom tanggal follow-up
            $table->text('followup_notes')->nullable(); // Kolom catatan follow-up (opsional)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_records', function (Blueprint $table) {
            $table->dropColumn('followed_up');
            $table->dropColumn('followup_date');
            $table->dropColumn('followup_notes');
        });
    }
};
