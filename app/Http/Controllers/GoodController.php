<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function index()
    {
        $title = "Data Goods";
        $goods = Good::orderBy('id', 'asc')->get();
        return view('goods.index', compact('goods', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Good $good)
    {
        $title = "Add Data Goods";
        $goods = Good::Where('id','good')->get();
        $warehouses = Warehouse::all();
        return view('goods.create', compact('good', 'title','warehouses'));
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
            'warehouse_id' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        Good::create($request->post());

        return redirect()->route('goods.index')->with('success', 'Goods has been created successfully.');
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
    public function edit(Good $good)
    {
        $title = "Edit Data user";
        $warehouses = Warehouse::all();
        return view('goods.edit', compact('goods', 'title','warehouses'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        $good->delete();
        return redirect()->route('goods.index')->with('success', 'Good has been deleted successfully');
    }
}
