<?php

namespace App\Exports;

use App\Models\DecisionType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DecisionTypesExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithMapping
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
        $sheet->getStyle('A1:BF' . DecisionType::count() + 1)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:BF1')->getFont()->setBold(true);
        return;
    }

    public function collection()
    {
        return DecisionType::search($this->search)->get();
    }

    public function map($decision_type): array
    {
        return [
            $decision_type->id,
            $decision_type->name,
        ];
    }

    public function headings(): array
    {
        if ($this->originalCoulmns) {
            return [
                __('site.id'),
                __('site.name'),
            ];
        } else {
            return [
                'id',
                'name',
            ];
        }
    }
}
