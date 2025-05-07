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
        Schema::create('buildings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('contract_date')->nullable();
            $table->string('area')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('disputs_reason')->nullable();
            $table->enum('building_status', ['owned', 'disputed'])->default('owned');
            $table->text('location')->nullable();
            $table->timestamps();
            // Foreign keys
            $table->uuid('government_id')->nullable();
            $table->uuid('city_id')->nullable();
            // Foreign key constraints
            $table->foreign('government_id')->references('id')->on('governments')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
