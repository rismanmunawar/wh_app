<?php

namespace App\Http\Controllers;

use App\Models\RAB;
use App\Models\User;
use App\Models\RABDetails;
use Illuminate\Http\Request;

class RABController extends Controller
{
    public function index()
    {
        $title = "Data RAB";
        $rabs = RAB::orderBy('id', 'asc')->get();
        return view('rabs.index', compact('rabs', 'title'));
    }

    public function create()
    {
        $title = "Add Data RAB";
        $managers = User::Where('position', '1')->get();
        return view('rabs.create', compact('title', 'managers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_rab' => 'required',
            // 'location' => 'required',
            // 'manager_id' => 'required',
        ]);
        dd($request);
        RAB::create($request->post());

        return redirect()->route('rabs.index')->with('success', 'RAB has been created successfully.');
    }

    public function edit(RAB $rab)
    {
        $title = "Edit Data RAB";
        $managers = User::Where('position', 'manager')->get();
        return view('rabs.edit', compact('RAB', "managers", 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, RAB $rab)
    {
        $request->validate([
            'nama' => 'required',
            'location' => 'required',
            'manager_id' => 'required',
        ]);

        $rab->fill($request->post())->save();

        return redirect()->route('rabs.index')->with('success', 'RAB Has Been updated successfully');
    }

    public function destroy(RAB $rab)
    {
        $rab->delete();
        return redirect()->route('rabs.index')->with('success', 'RAB has been deleted successfully');
    }
}
