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
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('school_id')->constrained('users')->onDelete('cascade'); 
            $table->string('gender');
            $table->string('phone');
            $table->date('dob');
            $table->string('state');
            $table->string('lga');
            $table->string('address');
            $table->string('landmark')->nullable();
            $table->string('photo_link')->nullable();
            $table->string('photo_link_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
