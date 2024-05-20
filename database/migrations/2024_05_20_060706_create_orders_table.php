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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('payment_method');
            $table->string('buyer_name');
            $table->string('buyer_phone');
            $table->string('buyer_email');
            $table->string('delivery_address');
            $table->float('total_price');
            $table->smallInteger('status');
            $table->foreign('customer_id')->cascadeOnDelete()->cascadeOnUpdate()->references('id')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
