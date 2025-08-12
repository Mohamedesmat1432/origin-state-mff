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
        Schema::disableForeignKeyConstraints();

        Schema::create('origins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('decision_num')->nullable();
            $table->year('decision_date')->nullable();
            $table->string('decision_image')->nullable();
            $table->uuid('decision_type_id')->nullable();
            $table->string('total_area_allocated')->nullable();
            $table->string('total_area_coords')->nullable();
            $table->string('used_area')->nullable();
            $table->string('available_area')->nullable();
            $table->string('remaining_area')->nullable();
            $table->string('vacant_buildings')->nullable();
            $table->string('executing_entity_num')->nullable();
            $table->text('location')->nullable();
            $table->enum('location_status', ['accept', 'good', 'very_good', 'excellent'])->default('accept');
            $table->enum('origin_status', ['inprogress', 'revision', 'completed'])->default('inprogress');          
            $table->text('notes')->nullable();         
            $table->timestamps();
            // Foreign keys
            $table->uuid('project_id')->nullable();
            $table->uuid('government_id')->nullable();
            $table->uuid('city_id')->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('revised_by')->nullable();
            $table->uuid('completed_by')->nullable();
            // Foreign key constraints
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('decision_type_id')->references('id')->on('decision_types')->onDelete('cascade');
            $table->foreign('government_id')->references('id')->on('governments')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('revised_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('completed_by')->references('id')->on('users')->onDelete('set null');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origins');
    }
};
