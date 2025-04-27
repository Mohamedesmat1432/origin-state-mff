<?php

namespace App\Exports;

use App\Models\Origin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OriginsExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithMapping
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */

    protected $search = '';
    protected $originalCoulmns = false;

    public function __construct($search)
    {
        $this->search = $search;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:BF' . Origin::count() + 1)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:BF1')->getFont()->setBold(true);
        return;
    }

    public function collection()
    {
        return Origin::search($this->search)->get();
    }

    public function map($origin): array
    {
        return [
            $origin->id,
            $origin->project?->name,
            $origin->decision_num,
            $origin->decision_date,
            $origin->decisionType?->name,
            $origin->total_area_allocated,
            $origin->total_area_coords,
            $origin->statement?->name,
            $origin->used_area,
            $origin->executing_entity_num,
            $origin->government?->name,
            $origin->city?->name,
            $origin->location,
            $origin->location_status,
            $origin->available_area,
            $origin->vacant_buildings,
            $origin->remaining_area,
            $origin->notes,
            $origin->origin_status,
            $origin->decision_image,
        ];
    }

    public function headings(): array
    {
        if ($this->originalCoulmns) {
            return [
                __('site.id'),
                __('site.project_id'),
                __('site.decision_num'),
                __('site.decision_date'),
                __('site.decision_type_id'),
                __('site.total_area_allocated'),
                __('site.total_area_coords'),
                __('site.statement_id'),
                __('site.used_area'),
                __('site.executing_entity_num'),
                __('site.government_id'),
                __('site.city_id'),
                __('site.location'),
                __('site.location_status'),
                __('site.available_area'),
                __('site.vacant_buildings'),
                __('site.remaining_area'),
                __('site.notes'),
                __('site.origin_status'),
                __('site.decision_image'),
            ];
        } else {
            return [
                'id',
                'project_id',
                'decision_num',
                'decision_date',
                'decision_type_id',
                'total_area_allocated',
                'total_area_coords',
                'statement_id',
                'used_area',
                'executing_entity_num',
                'government_id',
                'city_id',
                'location',
                'location_status',
                'available_area',
                'vacant_buildings',
                'remaining_area',
                'notes',
                'origin_status',
                'decision_image',
            ];
        }
    }
}
