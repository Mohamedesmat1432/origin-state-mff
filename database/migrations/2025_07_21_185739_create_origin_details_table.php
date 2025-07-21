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
        Schema::create('origin_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('origin_id');
            $table->foreign('origin_id')->references('id')->on('origins')->onDelete('cascade');
            $table->decimal('unit_area')->nullable();
            $table->integer('number_of_buildings_executed')->nullable();
            $table->integer('number_of_units')->nullable();
            $table->integer('residential_units')->nullable();
            $table->integer('administrative_units')->nullable();
            $table->integer('commercial_units')->nullable();
            $table->integer('commercial_shops')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origin_details');
    }
};
