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
        Schema::create('appraisee_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appraiser_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('appraisee_id')->constrained('users');
            $table->string('comment');
            $table->boolean('signed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appraisee_comments');
    }
};
