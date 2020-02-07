<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type;
use Illuminate\Support\Facades\DB;

class typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = type::all();
        return view('admin.type.typeList',compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type.addType');
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
            'status' => '1',
        ]);

        type::create($validatedData);
        return redirect()->back()->with('success', 'New Type is successfully added');
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
        $type = type::find($id);
        return view('admin.type.editPage', compact('type', 'id'));
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
            'status' => '1',
        ]);
        $type = type::find($id);
        $type->name = $request->get('name');

        $type->save();
        return redirect('type')->with('success', 'Data is successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = type::find($id);
        $type->delete();

        return redirect()->back()->with('success', 'Data is Deleted Successfully');
    }

    public function typeReport()
    {
        $type = DB::table('types')
                ->select('types.id','types.name')
                ->join('billings','types.id','billings.type')
                ->distinct()
                ->get();
        $billing = DB::table('billings')
                    ->select('billings.type','billings.length','billings.totalBill')
                    ->get();
       return view('admin.type.typeReport',compact('type','billing'));
    }
}
