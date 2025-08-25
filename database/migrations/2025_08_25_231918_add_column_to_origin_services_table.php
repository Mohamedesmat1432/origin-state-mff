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
            if (!Schema::hasColumn('origin_services', 'used_area')) {
                $table->text('used_area')->nullable()->after('note');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('origin_services', function (Blueprint $table) {
            if (Schema::hasColumn('origin_services', 'used_area')) {
                $table->dropColumn('used_area');
            }
        });
    }
};
