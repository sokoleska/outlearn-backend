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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->unique(); // Povrzuvanje so users tabela
            $table->string("position");
            $table->string("company")->nullable();
            $table->enum("gender", ["male","female"])->nullable();
            $table->date("birth_date");
            $table->integer("work_experience_years")->nullable();    
            $table->timestamps();
        
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
