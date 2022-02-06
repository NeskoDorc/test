<?php

namespace App\Imports;

use App\Models\Supplier;
use App\Models\Part;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CsvImport implements ToCollection,WithHeadingRow
{


    public function __constract(){

    }

    public function collection(Collection $rows)
    {
        $b = false;
        foreach ($rows as $row) {

            if(!$b) {       //edited for accuracy
                $b = true;
                continue;
            }
            $exists = Supplier::where('supplier_name',$row['supplier_name'])->first();
            if (!$exists) {
               Supplier::create([
                    'supplier_name' => $row['supplier_name'],
                ]);


            }else {
                $prob = Supplier::where('supplier_name',$row['supplier_name'] )->first();
            //                dd($row);
                Part::create([
                    'supplier_id' => $prob->id,
                    'days_valid' => $row['days_valid'],
                    'priority' => $row['priority'],
                    'part_number' => $row['part_number'],
                    'part_desc' => $row['part_desc'],
                    'quantity' => $row['quantity'],
                    'price' => $row['price'],
                    'condition' => $row['condition'],
                    'category' => $row['category'],
                ]);

            }

        }


    }
}
