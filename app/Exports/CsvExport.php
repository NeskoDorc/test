<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Part;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CsvExport implements FromCollection,WithHeadings,WithMapping
{

    private $idSupplier;

    public function __construct($idSupplier)
    {
        $this->idSupplier = $idSupplier;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        return $this->idSupplier;

    }

    public function headings(): array
    {
       return ["part_desc", "category", "part_number","quantity", "price", "priority","days_valid", "condition"];
    }


    public function map($row): array
    {
        return [
            $row->part_desc,
            $row->category,
            $row->part_number,
            $row->quantity,
            $row->price,
            $row->priority,
            $row->days_valid,
            $row->condition,
            ];
    }
}
