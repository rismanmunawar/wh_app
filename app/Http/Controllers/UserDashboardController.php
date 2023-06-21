<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class UserDashboardController extends Controller
{
    public function index()
    {
        $title = "Data User";
        $users = user::orderBy('id', 'asc')->get();
        return view('users.index', compact('users', 'title'));
    }

    public function create()
    {
        $title = "Add Data user";
        $users = User::Where('position', 'user')->get();
        $positions = Position::all();
        $departments = Department::all();
        return view('users.create', compact('users', 'title', 'positions', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'position' => 'required',
            'department' => 'required',
        ]);

        user::create($request->post());

        return redirect()->route('users.index')->with('success', 'user has been created successfully.');
    }

    public function edit(User $user)
    {
        $title = "Edit Data user";
        $positions = Position::all();
        $departments = Department::all();
        return view('users.edit', compact('user', 'title', "positions", 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'position' => 'required',
            'department' => 'required',
        ]);

        $user->fill($request->post())->save();

        return redirect()->route('users.index')->with('success', 'user Has Been updated successfully');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user has been deleted successfully');
    }
}
