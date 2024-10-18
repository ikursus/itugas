<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\Jawatan;
use App\Models\Bahagian;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $senaraiJawatan = Jawatan::select('id', 'name')->get();
        $senaraiBahagian = Bahagian::select('id', 'name')->get();
        $senaraiUnit = Unit::select('id', 'name')->get();

        return view('template-profil', compact('user', 'senaraiJawatan', 'senaraiBahagian', 'senaraiUnit'));
    }

    public function update(Request $request)
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

        $user = User::findOrFail(auth()->id());
        $user->update($data);

        return redirect()->route('profil.index')->with('alert-berjaya', 'Rekod berjaya dikemaskini');
    }
}
