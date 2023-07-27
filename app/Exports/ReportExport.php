<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class ReportExport implements FromCollection , WithHeadings , WithMapping , WithStyles  , WithColumnWidths
{
    public $ids;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Project::query()->whereIn('id' , $this->ids)->orderByDesc('created_at')->get();
    }

    public function headings(): array
    {
        return [
            'الشركة',
            'رقم الرخصة',
            'صاحب الترخيص',
            'نوع التعهد',
            'المنطقة',
            'القطاع',
            'رقم مكاني',
            'تاريخ بداية التعهد',
            'تاريخ نهاية التعهد',
            'فترة التعهد',
            'هاتف',
            'موبايل',
            'الإجراء المتخذ',
            'تاريخ الإنشاء',
        ];
    }



    public function columnWidths(): array
    {
        return [
            'A' => 25,
            'B' => 25,
            'C' => 25,
            'D' => 25,
            'E' => 25,
            'F' => 25,
            'G' => 25,
            'H' => 25,
            'I' => 25,
            'J' => 25,
            'K' => 25,
            'L' => 25,
            'M' => 25,
            'N' => 25,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true], // Make the first row bold
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER], // Center align the first row
            ],
            'A1:Z1000' => [
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ],
        ];
    }


    public function map($project): array
    {
        return [
            $project->company_name,
            $project?->license_number,
            $project?->owner,
            $project->type?->name,
            $project->area?->name,
            $project->sector?->name,
            $project->place_number,
            $project->start_date,
            $project->end_date,
            $project->getPhaseInDays(),
            $project->phone_number,
            $project->mobile_number,
            $project->action?->name,
            $project->created_at,
        ];
    }
}
