<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CustomModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom-model {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $class = Str::studly($name);
        $table = Str::snake(Str::pluralStudly($name));
        $filename = date('Y_m_d_His') . "_create_{$table}_table.php";


        $fillable = [];
        $columns = [];
        $relationships = [];

        // جمع الأعمدة
        while (true) {
            $col = $this->ask('Column name (leave blank to finish)');
            if (!$col) break;

            $type = $this->anticipate("Type for $col", ['string', 'text', 'uuid', 'date', 'year', 'integer', 'boolean'], 'string');
            $nullable = $this->confirm("Is $col nullable?", true);
            $unique = $this->confirm("Is $col unique?", true);
            $addToFillable = $this->confirm("Add $col to fillable?", true);

            $columns[] = "\$table->$type('$col')" . ($nullable ? "->nullable()" : "") . ";";
            $columns[] = "\$table->$type('$col')" . ($unique ? "->unique()" : "") . ";";
            if ($addToFillable) $fillable[] = "'$col'";
        }

        // جمع العلاقات
        while (true) {
            $rel = $this->ask('Relation (type:model) ex: hasMany:User or empty to skip');
            if (!$rel) break;

            [$type, $model] = explode(':', $rel);
            $fk = Str::snake($model) . '_id';

            // مهاجرين للأعمدة والعلاقات
            $columns[] = "\$table->uuid('$fk')->nullable();";
            $columns[] = "\$table->foreign('$fk')->references('id')->on('" . Str::snake(Str::plural($model)) . "')->onDelete('cascade');";

            $method = Str::camel($model);
            if ($type == 'belongsTo') {
                $relationships[] = "public function $method()\n    {\n        return \$this->$type($model::class);\n    }";
            } elseif ($type == 'hasMany') {
                $relationships[] = "public function " . Str::plural($method) . "()\n    {\n        return \$this->$type($model::class);\n    }";
            }
        }

        // قراءة ملفات stubs
        $modelStub = file_get_contents(resource_path('stubs/livewire/model.stub'));
        $migrationStub = file_get_contents(resource_path('stubs/livewire/migration.stub'));

        // استبدال المتغيرات
        $modelStub = str_replace(
            ['{{ class }}', '{{ table }}', '{{ fillable }}', '{{ relationships }}'],
            [$class, $table, implode(', ', $fillable), implode("\n\n    ", $relationships)],
            $modelStub
        );

        $migrationStub = str_replace(
            ['{{ table }}', '{{ columns }}'],
            [$table, implode("\n            ", $columns)],
            $migrationStub
        );

        // Define paths for model, migration
        $modelPath = app_path("Models/{$class}.php");
        $migrationPath = database_path("migrations/{$filename}");

        // Create directories if they do not exist
        if (!file_exists(dirname($modelPath))) {
            mkdir(dirname($modelPath), 0777, true);
        }
        
        if(!file_exists(dirname($migrationPath))) {
            mkdir(dirname($migrationPath), 0777, true);
        }

        file_put_contents($modelPath, $modelStub);
        file_put_contents($migrationPath, $migrationStub);

        $this->info("✅ Model and migration generated for $class successfully.");
    }
}
