<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  view('tugas.template-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Laporan Tugas';
        // Dapatkan data senarai perkara yang ingin dipaparkan
        $senaraiPerkara = DB::table('perkaras')->where('is_enabled', '=', true)->get();
        // $senaraiPerkara = DB::table('perkaras')->where('is_enabled', true)->get();
        // $senaraiPerkara = DB::table('perkaras')->whereIsEnabled(true)->get();

        // respon paparkan template tanpa attach data
        // return view('tugas.template-create');

        // Attachkan data senarai perkara kepada template create untuk dipaparkan
        // Cara 1 attach data kepada template
        // return view('tugas.template-create')
        // ->with('senaraiPerkara', $senaraiPerkara)
        // ->with('pageTitle', $pageTitle);
        // Cara 2 attach data kepada template
        // return view('tugas.template-create', [
        //     'senaraiPerkara' => $senaraiPerkara,
        //     'pageTitle' => $pageTitle
        // ]);
        // Cara 3 attach data kepada template
        return view('tugas.template-create', compact('senaraiPerkara', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'perkara_id.*' => 'required|integer',
            'tindakan.*' => 'required|integer',
            'catatan.*' => 'nullable|sometimes',
            'catatan_tambahan' => 'nullable|sometimes',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  view('tugas.template-show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  view('tugas.template-edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tugas $tugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tugas $tugas)
    {
        //
    }
}
