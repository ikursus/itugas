<?php

namespace App\Http\Controllers;

use App\Models\Bahagian;
use Illuminate\Http\Request;
use App\Http\Requests\BahagianRequest;

class BahagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiBahagian = Bahagian::paginate(10);

        return view('bahagian.template-index', compact('senaraiBahagian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahagian.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BahagianRequest $request)
    {
        Bahagian::create( $request->validated() );

        return redirect()->route('bahagian.index')->with('alert-berjaya', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bahagian = Bahagian::findOrFail($id);

        return view('bahagian.template-edit', compact('bahagian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BahagianRequest $request, string $id)
    {
        $bahagian = Bahagian::findOrFail($id);
        $bahagian->update( $request->validated() );

        return redirect()->route('bahagian.index')->with('alert-berjaya', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bahagian = Bahagian::findOrFail($id);
        $bahagian->delete();

        return redirect()->route('bahagian.index')->with('alert-berjaya', 'Rekod berjaya dihapus');
    }
}
