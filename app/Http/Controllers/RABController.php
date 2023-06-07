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
        ]);
        $rab = [
            'no_rab' => $request->no_rab,
            'penyusun' => $request->penyusun,
            'tgl_rab' => $request->tgl_rab,
            'total' => $request->total,
        ];

        if ($result = RAB::create($rab)) {
            for ($i = 1; $i <= $request->jml; $i++) {
                $details = [
                    'no_rab' => $request->no_rab,
                    'id_product' => $request['productId' . $i],
                    'product_name' => $request['productName' . $i],
                    'price' => $request['price' . $i],
                    'qty' => $request['qty' . $i],
                    'sub_total' => $request['sub_total' . $i],
                ];
                RABDetails::create($request->post());
            }
        }



        dd($rab, $details);
        RABDetails::create($request->post());

        return redirect()->route('rabs.index')->with('success', 'RAB has been created successfully.');
    }

    public function edit(RAB $rab)
    {
        $title = "Edit Data RAB";
        // $managers = User::Where('position', 'manager')->get();
        // return view('rabs.edit', compact('RAB', "managers", 'title'));
        $managers = User::Where('position', '1')->orderBy('id', 'asc')->get();
        $details = RABDetails::Where('no_rab', $rab->no_rab)->orderBy('id', 'asc')->get();
        return view('rabs.edit', compact('rab', 'title', 'managers', 'detail'));
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
            'no_rab' => 'required'
        ]);

        // $rab->fill($request->post())->save();
        $rab->fill($request->post())->save();

        return redirect()->route('rabs.index')->with('success', 'RAB Has Been updated successfully');
    }

    public function destroy(RAB $rab)
    {
        $rab->delete();
        return redirect()->route('rabs.index')->with('success', 'RAB has been deleted successfully');
    }
}
