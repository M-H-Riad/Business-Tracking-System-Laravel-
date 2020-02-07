<?php

namespace App\Http\Controllers;

use App\billing;
use App;
use Illuminate\Http\Request;
use App\agency;
use App\type;
use App\client;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Imports\billingImport;




class billingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billing = DB::table('billings')
                    ->select('billings.id','billings.date','agencies.name as agency','clients.name as client'
                    ,'types.name as type','billings.length','billings.rate','billings.note')
                    ->join('agencies','billings.agency','agencies.id')
                    ->join('clients','billings.client','clients.id')
                    ->join('types','billings.type','types.id')
                    ->where('clients.status',1)
                    ->get();

        $agency = agency::all();
        $client = client::all();
        $type = type::all();

        return view('admin.billing.billingList', compact('client','billing','agency','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agency = agency::all();
        $client = client::all();
        $type = type::all();

        return view('admin.billing.createBill', compact('agency', 'client', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'date' => 'required',
                'agency' => 'required|numeric|gt:0',
                'client' => 'required|numeric|gt:0',
                'billNo' => 'required',
                'type' => 'required',
                'length' => 'required|numeric',
                'rate' => 'required|between:0,99.99',
                'totalBill' => 'required|numeric',
                'note' => 'required',
            ]);

            billing::create($validatedData);
            return redirect()->back()->with('success', 'New Bill is successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billing = billing::find($id);
        $agency = agency::all();
        $client = client::all();
        $type = type::all();
        return view('admin.billing.editPage', compact('billing', 'agency', 'type', 'client', 'id'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required',
            'agency' => 'required|numeric|gt:0',
            'client' => 'required|numeric|gt:0',
            'billNo' => 'required',
            'type' => 'required',
            'length' => 'required|numeric',
            'rate' => 'required|between:0,99.99',
            'totalBill' => 'required|numeric',
            'note' => 'required',
        ]);

        $billing = billing::find($id);

        $billing->date = $request->get('date');
        $billing->agency = $request->get('agency');
        $billing->client = $request->get('client');
        $billing->billNo = $request->get('billNo');
        $billing->type = $request->get('type');
        $billing->length = $request->get('length');
        $billing->rate = $request->get('rate');
        $billing->totalBill = $request->get('totalBill');
        $billing->note = $request->get('note');


        $billing->save();
        return redirect('billing')->with('success', 'Data is successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $billing = billing::find($id);
        $billing->delete();

        return redirect()->back()->with('success', 'Data is Deleted Successfully');
    }


}
