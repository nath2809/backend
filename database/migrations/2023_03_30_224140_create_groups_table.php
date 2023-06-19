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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('program_id')->references('id')->on('programs');
            $table->enum('status',['active', 'inactive'])->default('active');
            $table->date('start_date');
            $table->date('ending_date');
            $table->foreignId('tab_leader_id')->references('id')->on('users');
            $table->string('image_group')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
