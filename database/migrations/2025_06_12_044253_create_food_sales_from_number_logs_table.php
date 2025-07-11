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
        Schema::create('food_sales_from_number_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_sales_id')->constrained('food_sales_froms')->onDelete('cascade');
            $table->text('number')->nullable();
            $table->text('book')->nullable();
            $table->text('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_sales_from_number_logs');
    }
};
