<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agency;

class agencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agency = agency::all();
        return view('admin.agency.agencyList',compact('agency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agency.addAgency');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'phone' => 'required|numeric',
            'area' => 'required',
            'district' => 'required',
            'status' => '1',
        ]);

        agency::create($validatedData);
        return redirect()->back()->with('success', 'New Agency is successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agency = agency::find($id);
        return view('admin.agency.editPage', compact('agency', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'phone' => 'required|numeric',
            'area' => 'required',
            'district' => 'required',
            'status' => '1',
        ]);
        $agency = agency::find($id);

        $agency->name = $request->get('name');
        $agency->address = $request->get('address');
        $agency->contact = $request->get('contact');
        $agency->phone = $request->get('phone');
        $agency->area = $request->get('area');
        $agency->district = $request->get('district');

        $agency->save();
        return redirect('agency')->with('success', 'Data is successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $agency = agency::find($id);
        $agency->delete();

        return redirect()->back()->with('success', 'Data is Deleted Successfully');
    }
}
