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
            $table->string('product_number')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->float('price');
            $table->float('discount')->nullable();
            $table->string('dimensions')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('cover')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->enum('stock_status', ['in_stock', 'low_stock', 'out_of_stock', 'coming_soon'])->default('in_stock');
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
