<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JawatanRequest;

class JawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  view('jawatan.template-index');
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

        dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return  view('jawatan.template-show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  view('jawatan.template-edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JawatanRequest $request, string $id)
    {
        $data = $request->validated();

        dd($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
