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
        Schema::table('origins', function (Blueprint $table) {
            // Step 1: Drop the foreign key constraint
            $table->dropForeign(['statement_id']);

            // Step 2: Drop the column
            $table->dropColumn('statement_id');
        });
    }

    public function down(): void
    {
        Schema::table('origins', function (Blueprint $table) {
            $table->uuid('statement_id')->nullable();
            $table->foreign('statement_id')->references('id')->on('statements')->onDelete('set null');
        });
    }
};
