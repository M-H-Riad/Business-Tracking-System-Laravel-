<?php

namespace App\Http\Controllers;

use App\agency;
use Illuminate\Http\Request;
use App\client;
use Illuminate\Support\Facades\DB;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('clients')
            ->join('agencies', 'clients.company', 'agencies.id')
            ->select('clients.name as clientName', 'agencies.name as agentName','clients.id as clientId',
                'clients.address', 'clients.contact','clients.phone','clients.area', 'clients.district','clients.status');

        $client = $data->get();

        return view('admin.client.clientList', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agent = agency::all();
        return view('admin.client.addClient',compact('agent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'company' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'phone' => 'required|numeric',
            'area' => 'required',
            'district' => 'required',

        ]);

        $validatedData['status'] = 1;



        client::create($validatedData);
        return redirect()->back()->with('success', 'New Client is successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = client::find($id);
        $agent = agency::all();
        return view('admin.client.editPage', compact('client', 'id','agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'phone' => 'required|numeric',
            'area' => 'required',
            'district' => 'required',
            'status' => 'required',
        ]);

        $client = client::find($id);

        $client->name = $request->get('name');
        $client->company = $request->get('company');
        $client->address = $request->get('address');
        $client->contact = $request->get('contact');
        $client->phone = $request->get('phone');
        $client->area = $request->get('area');
        $client->district = $request->get('district');
        $client->status = $request->get('status');

        $client->save();
        return redirect('client')->with('success', 'Data is successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::find($id);
        $client->delete();

        return redirect()->back()->with('success', 'Data is Deleted Successfully');
    }
}
