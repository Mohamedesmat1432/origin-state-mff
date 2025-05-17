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
        Schema::create('locked_origins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            
            $table->uuid('origin_id')->nullable();
            $table->foreign('origin_id')->references('id')->on('origins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locked_origins');
    }
};
