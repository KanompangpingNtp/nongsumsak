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
        Schema::create('private_market_form_appointment_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('market_id')->constrained('private_market_forms')->onDelete('cascade');
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
        Schema::dropIfExists('private_market_form_appointment_logs');
    }
};
