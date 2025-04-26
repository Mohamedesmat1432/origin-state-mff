<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CustomLivewire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom-livewire {name}';

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

        // Ask the user for the type of component
        $type = $this->ask('What type of component? (create, update, list, delete, bulk-delete)', 'create');
        $typeClass = Str::studly($type);

        // Define the namespace, class name, view, trait
        $namespace = str_replace('/', '\\', $name);
        $class = class_basename($name);
        $kebabView =  Str::kebab($class);
        $snakView =  Str::snake($class);
        $trait = $class . 'Trait';

        // Load stub files
        $componentStub = file_get_contents(resource_path("stubs/livewire/{$type}-component.stub"));
        $viewStub = file_get_contents(resource_path("stubs/livewire/{$type}-view.stub"));
        $traitStub = file_get_contents(resource_path('stubs/livewire/trait.stub'));

        // Replace placeholders
        $componentStub = str_replace(
            ['{{ namespace }}', '{{ class }}', '{{ trait }}', '{{ kebabView }}', '{{ snakView }}'],
            [$namespace, $class, $trait, $kebabView, $snakView],
            $componentStub
        );

        $viewStub = str_replace(
            ['{{ kebabView }}', '{{ snakView }}'],
            [$kebabView, $snakView],
            $viewStub
        );

        $traitStub = str_replace(
            ['{{ trait }}', '{{ class }}', '{{ kebabView }}', '{{ snakView }}'],
            [$trait, $class, $kebabView, $snakView],
            $traitStub
        );

        // Define paths
        $componentPath = app_path("Livewire/{$name}/{$typeClass}{$name}.php");
        $viewPath = resource_path("views/livewire/{$kebabView}/{$type}-{$kebabView}.blade.php");
        $traitPath = app_path("Traits/{$trait}.php");

        // Create directories and files
        if (!file_exists(dirname($componentPath))) {
            mkdir(dirname($componentPath), 0777, true);
        }

        if (!file_exists(dirname($viewPath))) {
            mkdir(dirname($viewPath), 0777, true);
        }

        if (!file_exists(dirname($traitPath))) {
            mkdir(dirname($traitPath), 0777, true);
        }

        file_put_contents($componentPath, $componentStub);
        file_put_contents($viewPath, $viewStub);
        file_put_contents($traitPath, $traitStub);

        $this->info("✅ Livewire component, view, and trait for {$class} created successfully.");
    }
}
