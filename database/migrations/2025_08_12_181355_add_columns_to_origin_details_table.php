<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('origin_details', function (Blueprint $table) {
            if (!Schema::hasColumn('origin_details', 'statement_id')) {
                $table->uuid('statement_id')->nullable()->after('id');
                $table->foreign('statement_id', 'origin_details_statement_id_foreign')
                    ->references('id')
                    ->on('statements')
                    ->onDelete('cascade');
            }

            if (!Schema::hasColumn('origin_details', 'note')) {
                $table->text('note')->nullable()->after('used_area');
            }
        });
    }

    public function down(): void
    {
        // Find the actual FK name if it exists
        $foreignKeyName = DB::table('information_schema.key_column_usage')
            ->where('table_schema', DB::getDatabaseName())
            ->where('table_name', 'origin_details')
            ->where('column_name', 'statement_id')
            ->whereNotNull('constraint_name')
            ->value('constraint_name');

        Schema::table('origin_details', function (Blueprint $table) use ($foreignKeyName) {
            if ($foreignKeyName) {
                $table->dropForeign($foreignKeyName);
            }

            if (Schema::hasColumn('origin_details', 'statement_id')) {
                $table->dropColumn('statement_id');
            }

            if (Schema::hasColumn('origin_details', 'note')) {
                $table->dropColumn('note');
            }
        });
    }
};
