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
        Schema::create('private_market_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('form_status', [1, 2]);
            $table->string('title_name');
            $table->string('full_name');
            $table->string('age');
            $table->string('nationality');
            $table->string('id_card');
            $table->string('house_number');
            $table->string('alley');
            $table->string('road')->nullable();
            $table->string('village');
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->string('type_option');
            $table->string('submit_name')->nullable();
            $table->string('submit_address_number')->nullable();
            $table->string('submit_alley')->nullable();
            $table->string('submit_road')->nullable();
            $table->string('submit_village')->nullable();
            $table->string('submit_sub_district');
            $table->string('submit_district');
            $table->string('submit_province');
            $table->string('submit_phone')->nullable();
            $table->string('fee')->nullable();
            $table->string('receipt_number')->nullable();
            $table->date('receipt_date')->nullable();
            $table->string('status')->nullable();
            $table->string('copy_documents')->nullable();
            $table->string('refer_app_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_market_forms');
    }
};
