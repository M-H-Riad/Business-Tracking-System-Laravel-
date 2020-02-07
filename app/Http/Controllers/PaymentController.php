<?php

namespace App\Http\Controllers;

use App\agency;
use App\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function dependency(Request $request)
    {
        $id = $request->get('value');
        $client = DB::table('clients')->select('id','name')->where('company',$id)->get();
        return $client;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = DB::table('payments')
                    ->select('payments.id','payments.date','agencies.name as agency','clients.name as client'
                    ,'payments.payment','payments.note')
                    ->join('agencies','payments.agency','agencies.id')
                    ->join('clients','payments.client','clients.id')
                    ->where('clients.status',1)
                    ->get();
        return view('admin.payment.paymentList',compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agent = agency::all();
        return view('admin.payment.createPayment',compact('agent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $billing = DB::table('billings')->get();

       if (!empty($billing)){

           foreach ($billing as $bill){
               if ($bill->client == $request->client)
               {
                   $rules = $request->validate([
                       'date' => 'required',
                       'agency' => 'required|not_in:0',
                       'client' => 'required|not_in:0',
                       'payment' => 'required|not_in:0',
                       'note' => 'required',
                   ]);

                   payment::create($rules);
                   return redirect()->back()->with('success', 'New Payment is added successfully.');
               }
           }
           return redirect()->back()->withErrors('No Bills against the client.');
       }
       else
       {
           return redirect()->back()->withErrors('No Bills Created Yet.');
       }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payment  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = DB::table('payments')
            ->select('payments.id','payments.agency as agentId','payments.client as clientId','payments.date','agencies.name as agency','clients.name as client'
                ,'payments.payment','payments.note')
            ->join('agencies','payments.agency','agencies.id')
            ->join('clients','payments.client','clients.id')
            ->where('payments.id',$id)
            ->get()->first();

        return view('admin.payment.editPage',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        $payment = payment::find($payment->id);

        $payment->date = $request->get('date');
        $payment->agency = $request->get('agency');
        $payment->client = $request->get('client');
        $payment->payment = $request->get('payment');
        $payment->note = $request->get('note');

        $payment->save();
        return redirect('payment')->with('success', 'Data is successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        $payment = payment::find($payment->id);
        $payment->delete();

        return redirect()->back()->with('success', 'Data is Deleted Successfully');
    }
}
