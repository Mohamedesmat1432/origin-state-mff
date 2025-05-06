<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;

class OriginsExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    use Exportable;

    protected Builder $query;
    protected array $columns;
    protected bool $exportStatus = false;

    /**
     * @param Builder $query         // Eloquent query passed from controller or Livewire
     * @param array $columns         // Selected columns to export
     * @param bool $exportStatus     // If true, use raw values (not labels) and translate headings
     */
    public function __construct(Builder $query, array $columns, bool $exportStatus = false)
    {
        $this->query = $query;
        $this->columns = count($columns) ? $columns : ['id']; // fallback to id or default column
        $this->exportStatus = $exportStatus;
    }

    /**
     * Set whether to export raw enum values instead of labels.
     */
    public function withRawStatus(bool $value = true): self
    {
        $this->exportStatus = $value;
        return $this;
    }

    /**
     * Define the query for export.
     */
    public function query(): Builder
    {
        return $this->query;
    }

    /**
     * Define column headings.
     */
    public function headings(): array
    {
        return $this->exportStatus
            ? array_map(fn($column) => __('site.' . $column), $this->columns)
            : $this->columns;
    }

    /**
     * Map each row.
     */
    public function map($origin): array
    {
        $row = [];

        foreach ($this->columns as $column) {
            $row[] = match ($column) {
                'project_id'            => $origin->project?->name,
                'decision_num'          => $origin->decision_num,
                'decision_date'         => $origin->decision_date,
                'decision_type_id'      => $origin->decisionType?->name,
                'total_area_allocated'  => $origin->total_area_allocated,
                'total_area_coords'     => $origin->total_area_coords,
                'statement_id'          => $origin->statement?->name,
                'used_area'             => $origin->used_area,
                'executing_entity_num'  => $origin->executing_entity_num,
                'government_id'         => $origin->government?->name,
                'city_id'               => $origin->city?->name,
                'location'              => $origin->location,

                // Toggle between value and label for enum fields
                'location_status'       => $this->exportStatus
                    ? $origin->location_status->label()
                    : $origin->location_status->value,

                'available_area'        => $origin->available_area,
                'vacant_buildings'      => $origin->vacant_buildings,
                'remaining_area'        => $origin->remaining_area,
                'notes'                 => $origin->notes,

                'origin_status'         => $this->exportStatus
                    ? $origin->origin_status->label()
                    : $origin->origin_status->value,

                'decision_image'        => $origin->decision_image,
                'created_by'            => $origin->createdBy?->name,
                'revised_by'            => $origin->revisedBy?->name,
                'completed_by'          => $origin->completedBy?->name,

                default                 => '',
            };
        }

        return $row;
    }

    public function styles(Worksheet $sheet)
    {
        $columnCount = count($this->columns);
        $rowCount = $sheet->getHighestRow(); // This includes the header row

        if ($columnCount === 0 || $rowCount === 0) {
            return [];
        }

        $lastColLetter = $this->getExcelColumnLetter($columnCount);

        // Apply horizontal center alignment to the entire table range
        $sheet->getStyle("A1:{$lastColLetter}{$rowCount}")
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Make the header row bold
        $sheet->getStyle("A1:{$lastColLetter}1")->getFont()->setBold(true);

        return [];
    }

    protected function getExcelColumnLetter(int $index): string
    {
        $letter = '';
        while ($index > 0) {
            $index--;
            $letter = chr($index % 26 + 65) . $letter;
            $index = intdiv($index, 26);
        }
        return $letter;
    }
}
