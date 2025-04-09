<?php

namespace App\Imports;

use App\Models\Source;
use App\Models\Project;
use App\Models\Statement;
use App\Models\Government;
use App\Models\City;
use App\Models\Origin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
class OriginsImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public $skippedRows = [];

    public function model(array $row)
    {
        $source = Source::firstOrCreate([
            'name' => $row['source_id'],
        ]);

        $project = Project::firstOrCreate([
            'name' => $row['project_id'],
        ]);

        $statement = Statement::firstOrCreate([
            'name' => $row['statement_id'],
        ]);

        $government = Government::firstOrCreate([
            'name' => $row['government_id'],
        ]);

        $city = City::firstOrCreate([
            'government_id' => $government->id,
            'name' => $row['city_id'],
        ]);

        $origin = Origin::firstOrCreate([
            'decision_num' => $row['decision_num'],
            'decision_date' => $row['decision_date'],
            'source_id' => $source->id,
            'project_id' => $project->id,
            'statement_id' => $statement->id,
            'government_id' => $government->id,
            'city_id'  => $city->id,
            'location' => $row['location'],
            'area' => $row['area'],
            'internal_incoming_num' => $row['internal_incoming_num'],
            'internal_incoming_date' => $row['internal_incoming_date'],
            'notes' => $row['notes'],
        ]);
    }

    public function rules(): array
    {
        return [
            'decision_num' => 'required|numeric',
            'decision_date' => 'required|numeric',
            'source_id' => 'required|string',
            'project_id' => 'required|string',
            'statement_id' => 'required|string',
            'government_id' => 'required|string',
            'city_id' => 'required|string',
            'location' => 'nullable|string|max:255',
            'area' => 'required|numeric',
            'internal_incoming_num' => 'required|numeric',
            'internal_incoming_date' => 'required|date',
            'notes' => 'nullable|string',
        ];
    }
}
