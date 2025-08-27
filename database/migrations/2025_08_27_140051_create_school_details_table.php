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
        Schema::create('school_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('reg_number');
            $table->string('school_type');
            $table->string('ownership_type');
            $table->string('email');
            $table->string('phone_no');
            $table->string('state');
            $table->string('lga');
            $table->string('address');
            $table->string('admin_name');
            $table->string('admin_phone');
            $table->string('admin_email');
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
        Schema::dropIfExists('school_details');
    }
};
