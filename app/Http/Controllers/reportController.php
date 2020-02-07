<?php

namespace App\Http\Controllers;

use App\agency;
use App\client;
use App\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reportController extends Controller
{
    public function viewClientReport()
    {
        $clients = DB::table('clients')
            ->select('agencies.name as agentName','clients.name as clientName',
                'clients.id as clientId','billings.client')
            ->Join('agencies','clients.company','agencies.id')
            ->join('billings','billings.client','clients.id')
            ->distinct('billings.client')
            ->where('clients.status',1)
            ->get();

        $billing = DB::table('billings')
            ->select('billings.totalBill','billings.client')
            ->get();

        $payment = DB::table('payments')
            ->select('payments.client as clientId','payments.payment as totalPayment')

            ->get();

        return view('admin.finalReport.clientReoprt', compact('clients',  'payment','billing','agency'
            ,'client','type'));
    }

    public function clientDetails($id)
    {
        $clientName = DB::table('clients')->select('name')->where('id',$id)->get()->first();
        $clients = DB::table('clients')
            ->select('agencies.name as agentName','clients.name as clientName',
                'clients.id as clientId')
            ->Join('agencies','clients.company','agencies.id')
            ->where('clients.status',1)
            ->where('clients.id',$id)
            ->get();

        $bill = DB::table('billings')
            ->select('billings.date as billDate','billings.totalBill','billings.note')
            ->where('billings.client',$id)
            ->orderByDesc('billDate')
            ->get();

        $payment = DB::table('payments')
            ->select('payments.date as payDate','payments.note','payments.date as paymentDate','payment')
            ->where('payments.client',$id)
            ->orderByDesc('paymentDate')
            ->get();

        return view('admin.finalReport.singleClientView',compact('clients','payment','bill','clientName'));

        /*echo '<pre>';
        print_r($clientName);
        exit();*/
    }

    public function SingleAgentDetails($id)
    {
        $clients = DB::table('clients')
            ->select('agencies.name as agentName','clients.company as agentId','clients.name as clientName',
                'clients.id as clientId')
            ->Join('agencies','clients.company','agencies.id')
            ->join('billings','billings.client','clients.id')
            ->distinct('clientId')
            ->where('clients.status',1)
            ->where('clients.company',$id)
            ->get();

        $billing = DB::table('billings')
            ->select('billings.totalBill','billings.client')
            ->join('clients','billings.client','clients.id')
            ->where('clients.status',1)
            ->where('billings.agency',$id)
            ->orderByDesc('billings.totalBill')
            ->get();

        $payment = DB::table('payments')
            ->select('payments.client as clientId','payments.payment as totalPayment')
            ->where('payments.agency',$id)
            ->get();
        $agency = DB::table('agencies')->select('agencies.name')->where('id',$id)->get()->first();


        return view('admin.finalReport.singleAgentView', compact('clients',  'payment','billing','agency'));
    }

    public function viewAgentReport()
    {
        $agency = DB::table('agencies')
            ->select('agencies.name as agentName',
                'agencies.id as agentId')
            ->join('billings','billings.agency','agencies.id')
            ->join('clients','billings.client','clients.id')
            ->distinct('agencies.agentId')
            ->where('clients.status',1)
            ->orderByDesc('billings.totalBill')
            ->get();

        $billing = DB::table('billings')
            ->select('billings.totalBill','billings.agency')
            ->join('clients','billings.client','clients.id')
            ->where('clients.status',1)
            ->orderByDesc('billings.totalBill')
            ->get();

        $payment = DB::table('payments')
            ->select('payments.agency as agentId','payments.payment as totalPayment')
            ->join('clients','payments.client','clients.id')
            ->where('clients.status',1)
            ->get();


        return view('admin.finalReport.agencyReport', compact('payment','billing','agency'));
    }

    public function result(Request $request)
    {
        $billReport = DB::table('billings')
            ->select('billings.id', 'billings.date as date', 'agencies.name as agentName',
                'clients.name as clientName', 'billings.billNo', 'types.name as typeName',
                'billings.length', 'billings.rate', 'billings.totalBill', 'billings.note')
            ->join('agencies', 'billings.agency', 'agencies.id')
            ->join('clients', 'billings.client', 'clients.id')
            ->join('types', 'billings.type', 'types.id');

        $agency = agency::all();
        $clients = client::all();
        $types = type::all();

        $agent = $request->get('agency');
        $client = $request->get('client');
        $type = $request->get('type');
        $sDate = $request->get('startDate');
        $eDate = $request->get('endDate');

        if (!empty($agent)) {
            if (!empty($client)) {
                if (!empty($type)) {
                    if (!empty($sDate and $eDate)) {
                        $billReport->where('agencies.id', $agent)
                            ->where('clients.id', $client)
                            ->where('types.id', $type)
                            ->whereRaw("date(billings.date) >= '" . $sDate . "' AND date(billings.date) <= '" .
                                $eDate . "'");
                    } else {
                        $billReport->where('agencies.id', $agent)
                            ->where('clients.id', $client)
                            ->where('types.id', $type);
                    }
                } elseif (!empty($sDate and $eDate)) {
                    $billReport->where('agencies.id', $agent)
                        ->where('clients.id', $client)
                        ->whereRaw("date(billings.date) >= '" . $sDate . "' AND date(billings.date) <= '" . $eDate . "'");
                } else {
                    $billReport->where('agencies.id', $agent)
                        ->where('clients.id', $client);
                }
            } elseif (!empty($type)) {
                if (!empty($sDate and $eDate)) {
                    $billReport->where('agencies.id', $agent)
                        ->where('types.id', $type)
                        ->whereRaw("date(billings.date) >= '" . $sDate . "' AND date(billings.date) <= '" . $eDate
                            . "'");
                } else {
                    $billReport->where('agencies.id', $agent)
                        ->where('types.id', $type);
                }
            } elseif (!empty($sDate and $eDate)) {
                $billReport->where('agencies.id', $agent)
                    ->whereRaw("date(billings.date) >= '" . $sDate . "' AND date(billings.date) <= '" . $eDate . "'");
            } else {
                $billReport->where('agencies.id', $agent);
            }
        } elseif (!empty($client)) {
            if (!empty($type)) {
                if (!empty($sDate and $eDate)) {
                    $billReport->where('clients.id', $client)
                        ->where('types.id', $type)
                        ->whereRaw("date(billings.date) >= '" . $sDate . "' AND date(billings.date) <= '" . $eDate . "'");
                } else {
                    $billReport->where('clients.id', $client)
                        ->where('types.id', $type);
                }
            } elseif (!empty($sDate and $eDate)) {
                $billReport->where('clients.id', $client)
                    ->whereRaw("date(billings.date) >= '" . $sDate . "' AND date(billings.date) <= '" . $eDate . "'");
            } else {
                $billReport->where('clients.id', $client);
            }
        } elseif (!empty($type)) {
            if (!empty($sDate and $eDate)) {
                $billReport->where('types.id', $type)
                           ->whereRaw("date(billings.date) >= '" . $sDate . "' AND date(billings.date) <= '" . $eDate .
                             "'");
            } else {
                $billReport->where('types.id', $type);
            }
        } elseif (!empty($sDate and $eDate)) {
            $billReport->whereRaw("date(billings.date) >= '" . $sDate . "' AND date(billings.date) <= '" . $eDate . "'");
        } else {
            return back()->withErrors('Some field is missing.');
        }

        $report = $billReport->get();
        return view('admin.billing.searchResult', compact('report', 'agency', 'clients', 'types'));

    }

}
