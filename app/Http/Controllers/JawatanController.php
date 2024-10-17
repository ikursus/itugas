<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\JawatanRequest;

class JawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiJawatan = DB::table('jawatan')->get();

        return  view('jawatan.template-index', compact('senaraiJawatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('jawatan.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JawatanRequest $request)
    {
        $data = $request->validated();

        DB::table('jawatan')->insert($data);

        return redirect()->route('jawatan.index')->with('alert-berjaya', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return  view('jawatan.template-show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jawatan = DB::table('jawatan')->where('id', '=', $id)->first();

        return  view('jawatan.template-edit', compact('jawatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JawatanRequest $request, string $id)
    {
        $data = $request->validated();

        DB::table('jawatan')->whereId($id)->update($data);

        return redirect()->back()->with('alert-berjaya', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jawatan')->whereId($id)->delete();

        return redirect()->route('jawatan.index')->with('alert-berjaya', 'Rekod berjaya dihapuskan');
    }
}
