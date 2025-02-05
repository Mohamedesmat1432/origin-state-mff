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
            $origin->decision_num,
            $origin->decision_date,
            $origin->source?->name,
            $origin->project?->name,
            $origin->statement?->name,
            $origin->government?->name,
            $origin->city?->name,
            $origin->location,
            $origin->area,
            $origin->internal_incoming_num,
            $origin->internal_incoming_date,
            $origin->notes,
            $origin->decision_image,
        ];
    }

    public function headings(): array
    {
        if ($this->originalCoulmns) {
            return [
                __('site.id'),
                __('site.decision_num'),
                __('site.decision_date'),
                __('site.source_id'),
                __('site.project_id'),
                __('site.statement_id'),
                __('site.government_id'),
                __('site.city_id'),
                __('site.location'),
                __('site.area'),
                __('site.internal_incoming_num'),
                __('site.internal_incoming_date'),
                __('site.notes'),
                __('site.decision_image'),
            ];
        } else {
            return [
                'id',
                'decision_num',
                'decision_date',
                'source_id',
                'project_id',
                'statement_id',
                'government_id',
                'city_id',
                'location',
                'area',
                'internal_incoming_num',
                'internal_incoming_date',
                'notes',
                'decision_image',
            ];
        }
    }
}
