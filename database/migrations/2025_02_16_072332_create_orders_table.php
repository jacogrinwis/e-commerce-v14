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
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('order_number')->unique();
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled']);
            $table->enum('shipping_method', [
                'pickup',
                'postnl-standard',
                'postnl-track-trace',
                'dhl-standard',
                'dhl-track-trace',
                'homerr'
            ]);
            $table->enum('payment_method', ['banktransfer', 'tikkie', 'paypal']);
            $table->json('shipping_address')->nullable();
            $table->float('shipping_cost')->default(0);
            $table->float('subtotal');
            $table->float('discount')->default(0);
            $table->float('total_amount');
            $table->text('notes')->nullable();
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
