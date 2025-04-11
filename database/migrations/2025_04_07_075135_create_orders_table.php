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
            $table->foreignId('buyer_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('total_price', 8, 2);
            $table->enum('shipping_status', ['pending', 'shipped'])->default('pending'); //
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid'); //
            $table->string('shipping_address');
            $table->enum('payment_method', ['credit card', 'paypal', 'bank transfer', 'cash on delivery', 'e-wallet transfer'])->default('credit card'); //

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
