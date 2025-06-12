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
        Schema::create('food_sales_from_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_sales_id')->constrained('food_sales_froms')->onDelete('cascade');
            $table->integer('status')->default(1);
            $table->string('food_type')->nullable();
            $table->string('operation_area')->nullable();
            $table->string('annual_fee')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('receipt_date')->nullable();
            $table->string('business_name')->nullable();
            $table->string('number_of_workers')->nullable();
            $table->string('location_address')->nullable();
            $table->string('village_no')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_sales_from_details');
    }
};
