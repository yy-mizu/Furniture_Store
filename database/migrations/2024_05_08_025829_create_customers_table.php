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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
        
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->dateTime('joining_date');
            $table->string('password');
            $table->string('image');
            $table->string('uuid');
            $table->string('status');
  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
