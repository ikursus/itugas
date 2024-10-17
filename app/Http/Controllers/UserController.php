<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\Jawatan;
use App\Models\Bahagian;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiUsers = User::all();

        return view('users.template-index', compact('senaraiUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $senaraiJawatan = Jawatan::select('id', 'name')->get();
        $senaraiBahagian = Bahagian::select('id', 'name')->get();
        $senaraiUnit = Unit::select('id', 'name')->get();

        return view('users.template-create', compact('senaraiJawatan', 'senaraiBahagian', 'senaraiUnit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        // Memandangkan pada borang nombor ic menggunakan field bernama nric, maka assignkan nric kepada column database no_ic
        $data['no_ic'] = $request->input('nric');

        User::create($data);

        return redirect()->route('users.index')->with('alert-berjaya', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('users.template-show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $senaraiJawatan = Jawatan::select('id', 'name')->get();
        $senaraiBahagian = Bahagian::select('id', 'name')->get();
        $senaraiUnit = Unit::select('id', 'name')->get();

        return view('users.template-edit', compact('user', 'senaraiJawatan', 'senaraiBahagian', 'senaraiUnit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        // Memandangkan pada borang nombor ic menggunakan field bernama nric, maka assignkan nric kepada column database no_ic
        $data['no_ic'] = $request->input('nric');

        // Semak jika field password di isi. Jika ada password baru, attach kepada data
        if ($request->filled('password'))
        {
            // Validate supaya password ikut syarat
            $request->validate([
                'password' => 'min:3|confirmed'
            ]);
            // Attach password baru kepada $data untuk dikemaskini
            $data['password'] = $request->input('password');
        }

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('users.index')->with('alert-berjaya', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('alert-berjaya', 'Rekod berjaya dihapuskan');
    }
}
