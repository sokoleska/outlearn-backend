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
        Schema::create('student_interests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interest_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamp('created_at');
            
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_interests');
    }
};
