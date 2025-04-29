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
            $table->string('total_area_allocated')->nullable();
            $table->string('total_area_coords')->nullable();
            $table->string('used_area')->nullable();
            $table->string('executing_entity_num')->nullable();
            $table->text('location')->nullable();
            $table->enum('location_status', ['accept', 'good', 'very_good', 'excellent'])->default('accept');
            $table->enum('origin_status', ['inprogress', 'revision', 'completed'])->default('inprogress');
            $table->string('available_area')->nullable();
            $table->string('vacant_buildings')->nullable();
            $table->string('remaining_area')->nullable();
            $table->string('decision_image')->nullable();
            $table->text('notes')->nullable();
            $table->uuid('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->uuid('decision_type_id')->nullable();
            $table->foreign('decision_type_id')->references('id')->on('decision_types')->onDelete('cascade');
            $table->uuid('statement_id')->nullable();
            $table->foreign('statement_id')->references('id')->on('statements')->onDelete('cascade');
            $table->uuid('government_id')->nullable();
            $table->foreign('government_id')->references('id')->on('governments')->onDelete('cascade');
            $table->uuid('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
