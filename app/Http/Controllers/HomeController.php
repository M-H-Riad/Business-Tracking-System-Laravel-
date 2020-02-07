<?php

namespace App\Http\Controllers;
use App\agency;
use App\billing;
use App\client;
use App\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $billing = DB::table('billings')->join('clients','clients.id','billings.client')
                                ->where('clients.status',1)
                                ->get();
        $agency = agency::all();
        $client = client::all()->where('status',1);
        $payment = payment::all();

        $bill = DB::table('billings')
            ->select('billings.totalBill')
            ->join('clients','clients.id','billings.client')->where('clients.status',1)
            ->get();
        $pay = DB::table('payments')->select('payment')
            ->join('clients','clients.id','payments.client')->where('clients.status',1)
            ->get();
        $totalBill = 0;
        $totalPay = 0;

        foreach ($bill as $item)
        {
            $totalBill += $item->totalBill;
        }
        foreach ($pay as $value){
            $totalPay += $value->payment;
        }

        return view('admin.index',compact('billing','agency','client','payment'
        ,'totalBill','totalPay'));
    }
}
