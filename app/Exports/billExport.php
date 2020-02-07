<?php

namespace App\Exports;

use App\billing;
use Maatwebsite\Excel\Concerns\FromCollection;

class billExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return billing::all();
    }
}
