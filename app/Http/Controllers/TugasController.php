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

        // Associative Array
        $senaraiTugas = [
            'laut' => [
                'bawal',
                'siakap',
                'kerapu',
                'pari',
            ],
            'sungai' => [
                'keli',
                'haruan',
                'sepat'
            ],
        ];

        echo $senaraiTugas['sungai'][1];

        //return  view('tugas.template-index');
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
            'catatan_tambahan' => $request->input('catatan_tambahan')
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
        for($index = 0; $index < count($perkara); $index++)
        {
            DB::table('tugas_perkaras')->insert([
                'tugas_id' => $tugas,
                'perkara_id' => $perkara[$index],
                'tindakan' => $tindakan[$index],
                'catatan' => $catatan[$index]
            ]);
        }

        return 'sukses';

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
