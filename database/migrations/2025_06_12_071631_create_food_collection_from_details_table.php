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
        Schema::create('food_collection_from_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_collection_id')->constrained('food_collection_froms')->onDelete('cascade');
            $table->integer('status')->default(1);
            $table->string('operation_area')->nullable();
            $table->string('annual_fee')->nullable();
            $table->string('receipt_number')->nullable();
            $table->date('receipt_date')->nullable();
            $table->string('business_name')->nullable();
            $table->string('worker_count')->nullable();
            $table->string('address_no')->nullable();
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
        Schema::dropIfExists('food_collection_from_details');
    }
};
