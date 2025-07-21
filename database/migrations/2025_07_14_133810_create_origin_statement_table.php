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
        Schema::create('origin_statement', function (Blueprint $table) {
            $table->uuid('origin_id');
            $table->uuid('statement_id');

            $table->foreign('origin_id')->references('id')->on('origins')->onDelete('cascade');
            $table->foreign('statement_id')->references('id')->on('statements')->onDelete('cascade');

            $table->primary(['origin_id', 'statement_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origin_statement');
    }
};
