<?php

namespace App\Imports;

use App\Models\Project;
use App\Models\Statement;
use App\Models\Government;
use App\Models\City;
use App\Models\DecisionType;
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
        $project = Project::firstOrCreate([
            'name' => $row['project_id'],
        ]);

        $decision_type = DecisionType::firstOrCreate([
            'name' => $row['decision_type_id'],
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
            'decision_type_id' => $decision_type->id,
            'project_id' => $project->id,
            'total_area_allocated' => $row['total_area_allocated'],
            'total_area_coords' => $row['total_area_coords'],
            'statement_id' => $statement->id ?? '',
            'used_area' => $row['used_area'],
            'executing_entity_num' => $row['executing_entity_num'],
            'government_id' => $government->id,
            'city_id'  => $city->id,
            'location' => $row['location'],
            'location_status' => $row['location_status'] ?? 'accept',
            'available_area' => $row['available_area'],
            'vacant_buildings' => $row['vacant_buildings'],
            'remaining_area' => $row['remaining_area'],
            'notes' => $row['notes'],
            'origin_status' => $row['origin_status'] ?? 'inprogress',
            'user_id' => auth()->user()->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'project_id' => 'required|string',
            'decision_num' => 'required|numeric',
            'decision_date' => 'required|numeric',
            'decision_type_id' => 'required|string',
            'total_area_allocated' => 'required|numeric',
            'total_area_coords' => 'required|numeric',
            'statement_id' => 'nullable|string',
            'used_area' => 'required|numeric',
            'executing_entity_num' => 'required|numeric',
            'government_id' => 'required|string',
            'city_id' => 'required|string',
            'location' => 'required|string|max:500',
            'location_status' => 'required|in:accept,good,very_good,excellent',
            'available_area' => 'required|numeric',
            'vacant_buildings' => 'required|numeric',
            'remaining_area' => 'required|numeric',
            'notes' => 'nullable|string',
            'origin_status' => 'required|in:inprogress,revision,completed',
            'user_id' => 'nullable|string',
        ];
    }
}
