<?php

namespace App\Exports;

use App\billing;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class billingFromView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return billing::all();
    }
    public function view(): View
    {
        return view('admin.billing.table', [
            'billing' => DB::table('billings')
                ->select('billings.id', 'billings.created_at as date', 'agencies.name as agentName', 'clients.name as clientName', 'billings.billNo', 'types.name as typeName', 'billings.length', 'billings.rate', 'billings.payment', 'billings.note')
                ->join('agencies', 'billings.agency', 'agencies.id')
                ->join('clients', 'billings.client', 'clients.id')
                ->join('types', 'billings.type', 'types.id')
                ->orderBy('id', 'desc')->take(1000)->get()
        ]);
    }
}
