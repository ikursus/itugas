<?php

namespace App\Http\Controllers;

use App\Models\Perkara;
use Illuminate\Http\Request;

class PerkaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  view('perkara.template-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('perkara.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  view('perkara.template-show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  view('perkara.template-edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perkara $perkara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perkara $perkara)
    {
        //
    }
}
