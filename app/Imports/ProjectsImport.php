<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

class ProjectsImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public $skippedRows = [];
    
    public function model(array $row)
    {
        return Project::firstOrCreate([
            'name' => $row['name'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('projects') // Ensure national_number is unique in the Projects table
            ],
        ];
    }

    public function customValidationMessages()
    {
        return [
            'name.required' => 'The Project name is required.', // Other messages as needed
        ];
    }

    public function onFailure(...$failures)
    {
        foreach ($failures as $failure) {
            $this->skippedRows[] =  [
                'row' => $failure->row(), // Row number
                // 'attribute' => $failure->attribute(), // Column name
                'errors' => array_map('utf8_decode', $failure->errors()), // Validation errors
            ];
        }
    }
}
