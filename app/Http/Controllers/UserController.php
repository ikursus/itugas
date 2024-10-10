<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  view('users.template-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('users.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate semua field daripada borang
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email:filter'],
            'jawatan_id' => 'nullable|sometimes',
            'password' => 'required|confirmed|min:3',
            'nric' => 'required|digits:12',
            'no_staff' => 'required|digits:4',
            'no_phone' => 'required',
            'unit_id' => 'nullable|sometimes',
            'bahagian_id' => 'nullable|sometimes',
            'level' => 'required|integer'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  view('users.template-show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  view('users.template-edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
