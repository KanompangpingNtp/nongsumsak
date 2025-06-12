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
        Schema::create('food_sales_from_payment_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_sales_id')->constrained('food_sales_froms')->onDelete('cascade');
            $table->text('receipt_book')->nullable();
            $table->text('receipt_number')->nullable();
            $table->text('file')->nullable();
            $table->text('file_treasury')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_sales_from_payment_logs');
    }
};
