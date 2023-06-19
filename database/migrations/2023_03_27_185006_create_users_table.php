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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('type_document');
            $table->string('document_number')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->string('emergency_contact')->nullable()->unique();
            $table->date('birthdate')->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->string('image_profile')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
