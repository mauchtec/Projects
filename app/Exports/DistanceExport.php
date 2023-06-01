<?php
namespace App\Exports;

use App\Models\Distance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DistanceExport implements FromCollection, WithHeadings, WithStyles
{
    use Exportable;

    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function collection()
    {
        return Distance::where('user_id', $this->userId)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'From Place',
            'To Place',
            'Reason',
            'Transaction Type',
            'KMs',
            'Receipt',
            'Amount',
            'Date',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}