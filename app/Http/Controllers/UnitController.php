<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Bahagian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Query Builder
        // $senaraiUnit = DB::table('units')->all();
        // Dapatkan data menerusi Eloquent ORM / Model
        $senaraiUnit = Unit::with('bahagian')->paginate(2);

        return  view('unit.template-index', compact('senaraiUnit'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Dapatkan senarai bahagian
        $senaraiBahagian = Bahagian::select('id', 'name')->get();

        // respon paparkan template
        return  view('unit.template-create', compact('senaraiBahagian'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'bahagian_id' => 'required|integer',
        ]);

        // Cara 1 - new object
        // $unit = new Unit;
        // $unit->name = $request->input('name');
        // $unit->bahagian_id = $request->input('bahagian_id');
        // $unit->save();

        // Cara 2 - mass assignment
        $unit = Unit::create($data);

        return redirect()->route('unit.index')->with('alert-berjaya', 'Rekod berjaya disimpan');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Dapatkan senarai bahagian
        $senaraiBahagian = Bahagian::select('id', 'name')->get();

        // Dapatkan data unit yang ingin dikemaskini berdasarkan ID
        // $unit = Unit::where('id', '=', $id)->first();
        // $unit = Unit::whereId($id)->first();
        // $unit = Unit::find($id);
        $unit = Unit::findOrFail($id);
        // $unit = Unit::findOrCreate($id);

        return  view('unit.template-edit', compact('unit', 'senaraiBahagian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'bahagian_id' => 'required|integer',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update($data);

        return redirect()->route('unit.index')->with('alert-berjaya', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->route('unit.index')->with('alert-berjaya', 'Rekod berjaya dihapuskan');
    }
}
