<?php

namespace App\Exports;

use App\Models\Pertanian;
use Maatwebsite\Excel\Concerns\FromCollection;

class PertanianExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pertanian::all();
    }

    // public function headings(): array
    // {
    //     return [
    //         'ID',
    //         'Name',
    //         'Price',
    //         'Created At',
    //         'Updated At',
    //     ];
    // }
}
