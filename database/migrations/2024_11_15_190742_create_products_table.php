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
            $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();
            $table->foreignId('brand_id');
            $table->string('product_name',30);
            $table->text('description');
            $table->integer('discount')->nullable();
            $table->integer('stock');
            $table->string('image')->nullable();
            $table->string('status')->default('Active');
            $table->double('buying_price');
            $table->double('selling_price');
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
