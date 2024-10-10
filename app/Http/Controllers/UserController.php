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
        // Dapatkan SEMUA data (termasuk hidden field) daripada borang.
        // return $request->all();
        // Dapatkan data yang diperlukan sahaja
        // return $request->only('name', 'email');
        // Dapatkan SEMUA data KECUALI data - data tertentu
        // return $request->except('no_phone', 'no_staff');
        // Dapatkan nilai daripada 1 input field sahaja
        // return $request->input('name');
        // return $request->name;

        // if ($request->has('name') && !is_null($request->input('name'))) {
        //     // Dump and Die
        //     dd($request->name);
        // }

        // return 'Tiada nama';

        // return $request->server('HTTP_USER_AGENT');
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
