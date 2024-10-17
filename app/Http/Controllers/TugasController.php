<?php

namespace App\Http\Controllers;

use App\Http\Requests\TugasRequest;
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
        // Dapatkan senarai tugas untuk akaun yang sedang login
        // daripada table tugas dan sorting data latest di atas
        // dan data lama dibawah menerusi order by ID descending
        // $senaraiTugas = DB::table('tugas')
        // ->where('user_id', '=', auth()->id())
        // ->orderBy('id', 'desc')
        // //->get();
        // ->paginate(3);// pagination mengikut jumlah bilangan item per page
        $senaraiTugas = DB::table('tugas')
        ->join('users', 'tugas.user_id', '=', 'users.id') // Gabungkan kedua table tugas dan users
        ->where('tugas.user_id', '=', auth()->id()) // Filter tugas mengikut user yang sedang login
        ->orderBy('tugas.id', 'desc') // Sort data latest diatas
        ->select('tugas.*', 'users.name') // Pilih data yang nak dipaparkan daripada kedua table
        //->get();
        ->paginate(3);// pagination mengikut jumlah bilangan item per page

        return view('tugas.template-index', compact('senaraiTugas'));
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
    public function store(TugasRequest $request)
    {
        // Simpan data untuk table tugas
        $tugas = DB::table('tugas')->insertGetId([
            'user_id' => auth()->id(), // auth()->user()->id // Auth::user()->id // Auth::id()
            'catatan_tambahan' => $request->input('catatan_tambahan'),
            'created_at' => now() // Carbon::now()
        ]);

        // Dapatkan data perkara yang ditandakan untuk disimpan ke table tugas_perkaras
        $perkara = $request->input('perkara_id'); // array
        $tindakan = $request->input('tindakan'); // array
        $catatan = $request->input('catatan'); // array

        // Pastikan semua array sama panjang
        if (count($perkara) !== count($tindakan) || count($tindakan) !== count($catatan)) {
            throw new \Exception('Jumlah array mestilah sama.');
        }

        // Loopkan perkara yang ingin disimpan ke dalam table tugas_perkaras
        // Dapatkan index number daripada perkara supaya
        // data tindakan dan catatan adalah daripada index yang sama
        // foreach($perkara as $key => $value)
        for($index = 0; $index < count($perkara); $index++)
        {
            DB::table('tugas_perkaras')->insert([
                'tugas_id' => $tugas,
                'perkara_id' => $perkara[$index],
                'tindakan' => $tindakan[$index],
                'catatan' => $catatan[$index],
                'created_at' => now() // Carbon::now()
            ]);
        }

        // Respon redirect client ke senarai sejarah tugas selepas selesai simpan rekod
        // dan paparkan mesej alert rekod berjaya disimpan menerusi Flash Messaging
        return redirect()->route('tugas.index')->with('alert-berjaya', 'Rekod berjaya disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Dapatkan data tugas berdasarkan id yang dipilih
        $tugas = DB::table('tugas')
        ->rightJoin('tugas_perkaras', 'tugas.id', '=', 'tugas_perkaras.tugas_id')
        ->where('tugas.user_id', '=', auth()->id())
        ->where('tugas.id', '=', $id)
        ->select('tugas.*', 'tugas_perkaras.perkara_id', 'tugas_perkaras.tindakan', 'tugas_perkaras.catatan')
        ->get();

        // Dapatkan data perkara yang ditandakan untuk ditunjukkan pada table tugas_perkaras
        $senaraiPerkara = DB::table('perkaras')->where('is_enabled', '=', true)->get();

        return view('tugas.template-show', compact('tugas', 'senaraiPerkara'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return  view('tugas.template-edit', ['id' => $id]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Tugas $tugas)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Tugas $tugas)
    // {
    //     //
    // }
}
