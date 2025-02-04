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
        Schema::create('origins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('decision_num');
            $table->year('decision_date');
            $table->uuid('source_id')->nullable();
            $table->foreign('source_id')->references('id')->on('sources')->onDelete('cascade');
            $table->uuid('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->uuid('statement_id')->nullable();
            $table->foreign('statement_id')->references('id')->on('statements')->onDelete('cascade');
            $table->uuid('government_id')->nullable();
            $table->foreign('government_id')->references('id')->on('governments')->onDelete('cascade');
            $table->uuid('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->text('location')->nullable();
            $table->string('area')->nullable();
            $table->string('internal_incoming_num')->nullable();
            $table->date('internal_incoming_date')->nullable();
            $table->string('decision_image')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origins');
    }
};
