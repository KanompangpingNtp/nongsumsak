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
        Schema::create('food_collection_from_appointment_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_collection_id')->constrained('food_collection_froms')->onDelete('cascade');
            $table->text('title')->nullable();
            $table->text('detail')->nullable();
            $table->datetime('date_admin')->nullable();
            $table->datetime('date_user')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_collection_from_appointment_logs');
    }
};
