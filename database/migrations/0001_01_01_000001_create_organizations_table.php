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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country_code', 5);
            $table->string('currency_code', 5);
            $table->foreignId('state_id')->nullable()->constrained('states')->cascadeOnDelete();
            $table->string('gstin', 20)->nullable()->unique();
            $table->string('phone_number', 20)->nullable();
            $table->string('email')->nullable()->index();
            $table->text('address')->nullable();
            $table->unsignedInteger('financial_year_start_month');
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
