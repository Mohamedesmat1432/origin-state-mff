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
        Schema::table('origin_services', function (Blueprint $table) {
            if (!Schema::hasColumn('origin_services', 'note')) {
                $table->text('note')->nullable()->after('count');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('origin_services', function (Blueprint $table) {
            if (Schema::hasColumn('origin_services', 'note')) {
                $table->dropColumn('note');
            }
        });
    }
};
