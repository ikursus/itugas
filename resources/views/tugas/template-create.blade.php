@extends('template-induk')
{{-- @extends akan mencari template daripada folder resources/views --}}


@section('isi-kandungan-utama-disini')
{{-- Isi kandungan utama bermula --}}

<h1 class="mt-4">Tugas</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Daftar</li>
</ol>


<div class="row mb-4">
    <div class="col">
        <div class="card shadow-sm bg-body-tertiary rounded">
            <div class="card-header bg-primary text-white">
                Senarai Semak/Laporan Pegawai Bertugas
            </div>
            <div class="card-body bg-secondary">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-primary">
                        <thead>
                            <tr>
                                <th class="col-1">#</th>
                                <th class="col-5">Tugas</th>
                                <th class="col-2">Tandakan</th>
                                <th class="col-4">Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
    
                            {{-- Loop Senarai Perkara Mula --}}
                            <tr>
    
                                <td>
                                    1
                                </td>
                                <td>
                                    PERKARA
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tindakan[]" value="1">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tindakan[]" value="0">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>
                                </td>
    
                                <td>
                                    <textarea class="form-control" placeholder="Catatan" name="catatan[]"></textarea>
                                </td>
    
                            </tr>
                            {{-- Loop Senarai Perkara Tamat --}}
                        </tbody>
                    </table>
                </div>

                <div class="row my-5">
                    <div class="col">

                        <div class="form-floating">
                            <textarea 
                            class="form-control" 
                            placeholder="Catatan Tambahan (jika ada)" 
                            style="height: 150px" 
                            name="catatan_tambahan"></textarea>

                            <label>Catatan Tambahan (Jika Ada)</label>

                          </div>

                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Isi kandungan utama tamat disini --}}
@endsection


@push('js-script')

@endpush
