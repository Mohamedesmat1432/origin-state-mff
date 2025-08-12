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
        Schema::create('origin_services', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('origin_id');
            $table->foreign('origin_id')->references('id')->on('origins')->onDelete('cascade');

            $table->uuid('type_service_id');
            $table->foreign('type_service_id')->references('id')->on('type_services')->onDelete('cascade');

            $table->integer('count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origin_services');
    }
};
