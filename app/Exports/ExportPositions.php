<?php

namespace App\Exports;

use App\Models\Position;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPositions implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Position::all();
    }

    public function headings(): array
    {
        return ["ID", "Nama", "Keterangan", "Singkatan", "Created_at", "Update_at"];
    }
}
