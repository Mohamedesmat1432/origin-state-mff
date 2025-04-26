<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('livewire:init {name}', function (string $name) {
    Artisan::call("make:model {$name} -m");
    // Artisan::call("make:seeder {$name}Seeder");
    Artisan::call("make:livewire {$name}.List{$name}");
    Artisan::call("make:livewire {$name}.Create{$name}");
    Artisan::call("make:livewire {$name}.Update{$name}");
    Artisan::call("make:livewire {$name}.Show{$name}");
    Artisan::call("make:livewire {$name}.Delete{$name}");
    Artisan::call("make:livewire {$name}.BulkDelete{$name}");
    Artisan::call("make:livewire {$name}.Import{$name}");
    Artisan::call("make:livewire {$name}.Export{$name}");
    Artisan::call("make:import {$name}sImport --model={$name}");
    Artisan::call("make:export {$name}sExport --model={$name}");
    // Artisan::call("make:livewire {$name}.Restore{$name}");
    // Artisan::call("make:livewire {$name}.ForceDelete{$name}");
    // Artisan::call("make:livewire {$name}.ForceBulkDelete{$name}");
})->describe('Running commands');

// Artisan::command('make:custom-livewire {name}', function ($name) {

//     // Ask the user for the type of component
//     $type = $this->ask('What type of component? (create, update, list, delete, bulk-delete)', 'create');
//     $typeClass = Str::studly($type);

//     // Define the namespace, class name, view, trait, etc.
//     $namespace = str_replace('/', '\\', $name);
//     $class = class_basename($name);
//     $view = strtolower($class);
//     $trait = $class . 'Trait';

//     // Corrected the file_get_contents call to use double quotes for parsing variables
//     $componentStub = file_get_contents(resource_path("stubs/livewire/{$type}-component.stub"));
//     $viewStub = file_get_contents(resource_path("stubs/livewire/{$type}-view.stub"));
//     $traitStub = file_get_contents(resource_path('stubs/livewire/trait.stub'));

//     // Replacing placeholders in the stub files
//     $componentStub = str_replace(
//         ['{{ namespace }}', '{{ class }}', '{{ trait }}', '{{ view }}'],
//         [$namespace, $class, $trait, $view],
//         $componentStub
//     );

//     $viewStub = str_replace('{{ view }}', $view, $viewStub);

//     $traitStub = str_replace(
//         ['{{ trait }}', '{{ class }}', '{{ view }}'],
//         [$trait, $class, $view],
//         $traitStub
//     );

//     // Define paths for component, view, and trait
//     $componentPath = app_path("Livewire/{$name}/{$typeClass}{$name}.php");
//     $viewPath = resource_path("views/livewire/{$view}/{$type}-{$view}.blade.php");
//     $traitPath = app_path("Traits/{$trait}.php");

//     // Create directories if they do not exist
//     if (!file_exists(dirname($componentPath))) {
//         mkdir(dirname($componentPath), 0777, true);
//         file_put_contents($componentPath, $componentStub);
//     }

//     if (!file_exists(dirname($viewPath))) {
//         mkdir(dirname($viewPath), 0777, true);
//         file_put_contents($viewPath, $viewStub);
//     }

//     if (!file_exists(dirname($traitPath))) {
//         mkdir(dirname($traitPath), 0777, true);
//         file_put_contents($traitPath, $traitStub);
//     }

//     // Output a success message
//     $this->info("Livewire component, view, and trait for {$class} created successfully.");
// });


// Artisan::command('make:custom-model {name}', function ($name) {
//     // Define the class migrationClass, table, filename, etc.
//     $class = class_basename($name);
//     $migrationClass = 'Create' . Str::plural($class) . 'Table';
//     $table = Str::snake(Str::plural($class));
//     $filename = date('Y_m_d_His') . "_create_{$table}_table.php";

//     // 1️⃣ Ask for fillable fields
//     $fieldsInput = $this->ask("Enter fillable fields (comma separated)", 'name');
//     $fields = collect(explode(',', $fieldsInput))
//         ->map(fn($field) => trim($field))
//         ->filter()
//         ->map(fn($field) => "'$field'")
//         ->implode(', ');

//     // 2️⃣ Ask for relationships
//     $relationsInput = $this->ask("Enter relationships (e.g. users:hasMany:User), separate multiple with |", '');
//     $relationshipsCode = '';
//     if ($relationsInput) {
//         foreach (explode('|', $relationsInput) as $relation) {
//             [$name, $type, $model] = explode(':', $relation);
//             $relationshipsCode .= <<<EOT

//     public function {$name}()
//     {
//         return \$this->{$type}({$model}::class);
//     }
// EOT;
//         }
//     }

//     // 3️⃣ Ask for migration columns
//     $columnsInput = $this->ask("Enter migration columns (e.g. name:string, age:integer, email:string)", 'name:string');
//     $columns = collect(explode(',', $columnsInput))
//         ->map(fn($col) => explode(':', trim($col)))
//         ->map(fn($col) => "\$table->{$col[1]}('{$col[0]}');")
//         ->implode("\n            ");

//     // 🧾 Generate Model
//     $modelStub = file_get_contents(resource_path('stubs/livewire/model.stub'));
//     $migrationStub = file_get_contents(resource_path('stubs/livewire/migration.stub'));


//     $modelStub = str_replace(
//         ['{{ class }}', '{{ table }}', '{{ fields }}', '{{ relationships }}'],
//         [$class, $table, $fields, $relationshipsCode],
//         $modelStub
//     );

//     $migrationStub = str_replace(
//         ['{{ class }}', '{{ table }}', '{{ columns }}'],
//         [$migrationClass, $table, $columns],
//         $migrationStub
//     );

//     // Define paths for model, migration
//     $modelPath = app_path("Models/{$class}.php");
//     $migrationPath = database_path("migrations/{$filename}");

//     // Create directories if they do not exist
//     if (!file_exists(dirname($modelPath))) {
//         mkdir(dirname($modelPath), 0777, true);
//         mkdir(dirname($migrationPath), 0777, true);
//         file_put_contents($modelPath, $modelStub);
//         file_put_contents($migrationPath, $migrationStub);
//     }


//     $this->info("✅ Model and migration for {$class} created successfully.");
// });
