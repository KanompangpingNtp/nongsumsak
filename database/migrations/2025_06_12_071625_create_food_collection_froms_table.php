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
        Schema::create('food_collection_froms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('form_status')->nullable();
            $table->string('admin_name_verifier')->nullable();
            $table->string('title_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('age')->nullable();
            $table->string('nationality')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('address')->nullable();
            $table->string('village')->nullable();
            $table->string('alley')->nullable();
            $table->string('road')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('telephone')->nullable();
            $table->string('refer_app_id')->nullable();
            $table->string('copy_documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_collection_froms');
    }
};
