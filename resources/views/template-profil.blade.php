@extends('template-induk')
{{-- @extends akan mencari template daripada folder resources/views --}}

@section('isi-kandungan-utama-disini')
{{-- Isi kandungan utama bermula --}}

<h1 class="mt-4">Profil</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Maklumat Peribadi</li>
</ol>

<div class="row">

    <div class="col">

        <form method="POST" action="/profil">

            @csrf
            @method('PATCH')
            <input type="hidden" name="_method" value="PATCH" />

        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-user me-1"></i>
                Maklumat Akaun Pengguna
            </div>
            <!--//.card-header-->

            <div class="card-body bg-secondary">

                <div class="mb-3">
                    <label class="form-label">Nama Anda</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jawatan Anda</label>
                    <select class="form-select" name="jawatan_id">
                        <option value="">--Sila Pilih--</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Anda</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="row">

                    <div class="col-md">

                        <div class="mb-3">
                            <label class="form-label">Katalaluan Anda</label>
                            <input type="password" class="form-control" name="password">
                            <span class="text-muted">Kosongkan jika tidak ingin ubah password</span>
                        </div>

                    </div>

                    <div class="col-md">

                        <div class="mb-3">
                            <label class="form-label">Sahkan Katalaluan Anda</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md">

                        <div class="mb-3">
                            <label class="form-label">No. IC</label>
                            <input type="text" class="form-control" name="nric">
                        </div>

                    </div>

                    <div class="col-md">

                        <div class="mb-3">
                            <label class="form-label">No. Staff</label>
                            <input type="text" class="form-control" name="no_staff">
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md">

                        <div class="mb-3">
                            <label class="form-label">Bahagian</label>
                            <select class="form-select" name="bahagian_id">
                                <option value="">--Sila Pilih--</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md">

                        <div class="mb-3">
                            <label class="form-label">Unit</label>
                            <select class="form-select" name="unit_id">
                                <option value="">--Sila Pilih--</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md">

                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <select class="form-select" name="level">
                                <option value="">--Sila Pilih--</option>

                                @for($i = 1; $i <= 22; $i++)

                                    <option value="{{ $i }}">{{ $i }}</option>

                                @endfor

                            </select>
                        </div>

                    </div>

                    <div class="col-md">

                        <div class="mb-3">
                            <label class="form-label">No. Phone</label>
                            <input type="text" class="form-control" name="no_phone">
                        </div>
                    </div>

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
