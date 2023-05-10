<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class DepartmentController extends Controller
{
    public function index()
    {
        $title = "Data Department";
        $departments = Department::orderBy('id', 'asc')->paginate(5);
        return view('departments.index', compact('departments', 'title'));
    }

    public function create()
    {
        $title = "Add Data Department";
        $managers = User::Where('position', 'manager')->get();
        return view('departments.create', compact('managers', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'manager_id' => 'required',
        ]);

        Department::create($request->post());

        return redirect()->route('departments.index')->with('success', 'Department has been created successfully.');
    }

    public function edit(Department $department)
    {
        $title = "Edit Data Department";
        $managers = User::Where('position', 'manager')->get();
        return view('departments.edit', compact('department', "managers", 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'manager_id' => 'required',
        ]);

        $department->fill($request->post())->save();

        return redirect()->route('departments.index')->with('success', 'Department Has Been updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department has been deleted successfully');
    }
    public function exportPdf()
    {
        $title = "Laporan Data Department";
        $departments = Department::orderBy('id', 'asc')->get();
        $pdf = PDF::loadview('departments.pdf', compact('departments', 'title'));
        return $pdf->stream('laporan_department_pdf');
    }
}
