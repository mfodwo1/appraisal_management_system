<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('staff_id');
            $table->string('surname');
            $table->string('other_names');
            $table->date('date_of_birth');
            $table->string('diocese');
            $table->string('district');
            $table->string('sub_district');
            $table->date('first_appointment_date');
            $table->date('current_appointment_date');
            $table->string('current_grade');
            $table->string('professional_category');
            $table->string('specialty');
            $table->string('basic_qualification');
            $table->string('basic_qualification_year');
            $table->string('additional_qualification');
            $table->string('additional_qualification_year');
            $table->string('salary_level');
            $table->string('current_step');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
