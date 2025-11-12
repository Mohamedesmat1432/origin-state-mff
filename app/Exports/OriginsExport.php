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

    public function __construct(Builder $query, array $columns, bool $exportStatus = false)
    {
        $this->query = $query;
        $this->columns = count($columns) ? $columns : ['id'];
        $this->exportStatus = $exportStatus;
    }

    public function withRawStatus(bool $value = true): self
    {
        $this->exportStatus = $value;
        return $this;
    }

    public function query(): Builder
    {
        return $this->query;
    }

    public function headings(): array
    {
        return array_map(fn($column) => __('site.' . $column), $this->columns);
    }

    public function map($origin): array
    {
        $row = [];

        foreach ($this->columns as $column) {
            $row[] = match ($column) {
                'project_id'           => $origin->project?->name,
                'decision_num'         => $origin->decision_num,
                'decision_date'        => $origin->decision_date,
                'decision_type_id'     => $origin->decisionType?->name,
                'total_area_allocated' => $origin->total_area_allocated,
                'total_area_coords'    => $origin->total_area_coords,
                'government_id'        => $origin->government?->name,
                'city_id'              => $origin->city?->name,
                'executing_entity_num' => $origin->executing_entity_num,
                'used_area'            => $origin->used_area,
                'location'             => $origin->location,
                'remaining_area'       => $origin->remaining_area,

                'location_status'      => $this->exportStatus
                    ? $origin->location_status->label()
                    : $origin->location_status->value,

                'origin_status'        => $this->exportStatus
                    ? $origin->origin_status->label()
                    : $origin->origin_status->value,

                'record_status'        => $this->exportStatus
                    ? $origin->record_status->label()
                    : $origin->record_status->value,

                'notes'                => $origin->notes,

                'created_by'           => $this->exportStatus
                    ? $origin->createdBy?->name
                    : $origin->createdBy?->id,

                'revised_by'           => $this->exportStatus
                    ? $origin->revisedBy?->name
                    : $origin->revisedBy?->id,

                'completed_by'         => $this->exportStatus
                    ? $origin->completedBy?->name
                    : $origin->completedBy?->id,

                'coordinated_by'       => $this->exportStatus
                    ? $origin->coordinatedBy?->name
                    : $origin->coordinatedBy?->id,

                'decision_image'       => $origin->decision_image,
                'coordinates'          => json_encode($origin->coordinates ?? []),

                // Multi-line details in a single cell
                'details' => $origin->details
                    ->map(function ($d) {
                        return implode(' | ', [
                            __('site.statement') . ': ' . ($d->statement?->name ?? $d->statement_id),
                            __('site.unit_area') . ': ' . $d->unit_area,
                            __('site.number_of_buildings_executed') . ': ' . $d->number_of_buildings_executed,
                            __('site.number_of_units') . ': ' . $d->number_of_units,
                            __('site.residential_units') . ': ' . $d->residential_units,
                            __('site.administrative_units') . ': ' . $d->administrative_units,
                            __('site.commercial_units') . ': ' . $d->commercial_units,
                            __('site.commercial_shops') . ': ' . $d->commercial_shops,
                            __('site.note') . ': ' . $d->note,
                        ]);
                    })
                    ->implode("\n"),

                // Multi-line services in a single cell
                'services' => $origin->services
                    ->map(function ($s) {
                        return implode(' | ', [
                            __('site.type_service_id') . ': ' . ($s->typeService?->name ?? ''),
                            __('site.count') . ': ' . $s->count,
                        ]);
                    })
                    ->implode("\n"),

                default => $origin->{$column} ?? '',
            };
        }

        return $row;
    }

    public function styles(Worksheet $sheet)
    {
        $columnCount = count($this->columns);
        $rowCount = $sheet->getHighestRow();

        if ($columnCount === 0 || $rowCount === 0) {
            return [];
        }

        $lastColLetter = $this->getExcelColumnLetter($columnCount);

        // Center headers & make bold
        $sheet->getStyle("A1:{$lastColLetter}1")->getFont()->setBold(true);
        $sheet->getStyle("A1:{$lastColLetter}{$rowCount}")
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        // Enable wrap text for origin_details & origin_services columns
        foreach (['details', 'services'] as $colName) {
            $colIndex = array_search($colName, $this->columns) + 1;
            if ($colIndex > 0) {
                $colLetter = $this->getExcelColumnLetter($colIndex);
                $sheet->getStyle("{$colLetter}1:{$colLetter}{$rowCount}")
                    ->getAlignment()
                    ->setWrapText(true);
            }
        }

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
