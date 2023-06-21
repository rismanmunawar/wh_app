<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $title = "Data Warehouse";
        $warehouses = Warehouse::orderBy('id', 'asc')->get();
        return view('warehouses.index', compact('warehouses', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Data WareHouse";
        return view('warehouses.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        Warehouse::create($request->post());

        return redirect()->route('warehouses.index')->with('success', 'Warehouse has been created successfully.');
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
    public function edit(Warehouse $warehouse)
    {
        $title = "Edit Data WareHouse";
        return view('warehouses.edit', compact('warehouse', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $warehouse->fill($request->post())->save();

        return redirect()->route('warehouses.index')->with('success', 'Warehouse Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('warehouses.index')->with('success', 'Warehouse has been deleted successfully');
    }
}
