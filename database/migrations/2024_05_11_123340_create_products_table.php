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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('code_id');
            $table->unsignedBigInteger('supplier_id');

            $table->foreign('category_id')->cascadeOnDelete()->cascadeOnUpdate()->references('id')->on('categories');
            $table->foreign('admin_id')->cascadeOnDelete()->cascadeOnUpdate()->references('id')->on('admins');
            $table->foreign('code_id')->cascadeOnDelete()->cascadeOnUpdate()->references('id')->on('codes');
            $table->foreign('supplier_id')->cascadeOnDelete()->cascadeOnUpdate()->references('id')->on('suppliers');
            $table->string('description');
            $table->integer('price');
            $table->integer('stock');
            $table->string('uuid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
