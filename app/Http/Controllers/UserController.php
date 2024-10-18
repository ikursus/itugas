<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\Jawatan;
use App\Models\Bahagian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiUsers = User::with([
            'jawatan',
            'bahagian',
            'unit'
        ])
        ->get();

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
        $senaraiRole = Role::select('name')->get();

        return view('users.template-create', compact('senaraiJawatan', 'senaraiBahagian', 'senaraiUnit', 'senaraiRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        // Memandangkan pada borang nombor ic menggunakan field bernama nric, maka assignkan nric kepada column database no_ic
        $data['no_ic'] = $request->input('nric');

        $user = User::create($data);

        // Assignkan role kepada user
        $user->assignRole( $request->input('role') );

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
        $senaraiRole = Role::select('name')->get();

        return view('users.template-edit', compact('user', 'senaraiJawatan', 'senaraiBahagian', 'senaraiUnit', 'senaraiRole'));
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

        // Kemaskini rekod role
        $user->syncRoles( $request->input('role') );

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


    public function pdf(Request $request)
    {
        $senaraiUsers = User::with([
            'jawatan',
            'bahagian',
            'unit'
        ])
        ->get();

        $pdf = Pdf::loadView('users.template-pdf', compact('senaraiUsers'));

        // Semak jika file pdf ingin di download, maka force download ke dalam peranti pengguna
        if ($request->has('jenis') && $request->input('jenis') == 'download')
        {
            return $pdf->download( 'users.pdf' );
        }

        // Jika tidak, paparkan pdf secara terus di browser
        return $pdf->stream( 'users.pdf' );
    }
}
