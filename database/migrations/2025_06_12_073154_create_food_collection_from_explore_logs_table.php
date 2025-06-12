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
        Schema::create('food_collection_from_explore_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_collection_id')->constrained('food_collection_froms')->onDelete('cascade');
            $table->text('detail')->nullable();
            $table->text('price')->nullable();
            $table->string('list_option')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_collection_from_explore_logs');
    }
};
