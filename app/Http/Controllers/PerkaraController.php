<?php

namespace App\Http\Controllers;

use App\Models\Perkara;
use Illuminate\Http\Request;
use App\Http\Requests\PerkaraRequest;

class PerkaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiPerkara = Perkara::paginate(10);

        return view('perkara.template-index', compact('senaraiPerkara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perkara.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PerkaraRequest $request)
    {
        Perkara::create( $request->all() );

        return redirect()->route('perkara.index')->with('alert-berjaya', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perkara = Perkara::findOrFail($id);

        return view('perkara.template-edit', compact('perkara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerkaraRequest $request, $id)
    {
        $perkara = Perkara::findOrFail($id);
        $perkara->update( $request->validated() );

        return redirect()->route('perkara.index')->with('alert-berjaya', 'Rekod berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perkara = Perkara::findOrFail($id);
        $perkara->delete();

        return redirect()->route('perkara.index')->with('alert-berjaya', 'Rekod berjaya dihapuskan');
    }
}
