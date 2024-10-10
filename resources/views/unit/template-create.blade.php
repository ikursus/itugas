@extends('template-induk')
{{-- @extends akan mencari template daripada folder resources/views --}}

@section('isi-kandungan-utama-disini')
{{-- Isi kandungan utama bermula --}}

<h1 class="mt-4">Unit</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Daftar</li>
</ol>

<div class="row">

    <div class="col">

        <form method="POST" action="/unit">

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
            @csrf

        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-folder-open me-1"></i>
                Maklumat Unit
            </div>
            <!--//.card-header-->

            <div class="card-body bg-secondary">

                <div class="mb-3">
                    <label class="form-label">Bahagian</label>
                    <select class="form-select" name="bahagian_id">
                        <option value="">-- Pilih Bahagian --</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name">
                </div>

            </div>
            <!--//.card-body-->

            <div class="card-footer">

                <div class="gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-dark">Reset</button>
                </div>

            </div>
            <!--//.card-footer-->

        </div>
        <!--//.card-->

        </form>

    </div>
    <!--//.col-->

</div>
<!--//.row-->


{{-- Isi kandungan utama tamat disini --}}
@endsection

@push('js-script')

@endpush
