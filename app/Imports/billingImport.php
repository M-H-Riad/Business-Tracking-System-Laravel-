<?php

namespace App\Imports;

use App\billing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class billingImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null;
    */
    public function model(array $row)
    {


        return new billing ([
            'agency'    => $row['agency'],
            'client'    => $row['client'],
            'billNo'    => $row['billno'],
            'type'      => $row['type'],
            'length'    => $row['length'],
            'rate'      => $row['rate'],
            'payment'   => $row['payment'],
            'note'      => $row['note'],
        ]);
    }
}
