@extends('template-induk')
{{-- @extends akan mencari template daripada folder resources/views --}}

@section('isi-kandungan-utama-disini')
{{-- Isi kandungan utama bermula --}}

<h1 class="mt-4">Users</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Kemaskini</li>
</ol>

<div class="row">

    <div class="col">

        <form method="POST" action="{{ route('users.update', $user->id) }}">

            @csrf
            @method('PATCH')

            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-user me-1"></i>
                    Maklumat Akaun Pengguna
                </div>
                <!--//.card-header-->

                <div class="card-body bg-light">

                    @include('template-alerts')

                    <div class="mb-3">
                        <label class="form-label">Nama Pengguna</label>

                        <input
                        type="text"
                        class="form-control @error('name') is-invalid @elseif( old('name') ) is-valid @enderror"
                        name="name"
                        value="{{ old('name') ?? $user->name ?? NULL }}">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jawatan Pengguna</label>
                        <select
                        class="form-select @error('jawatan_id') is-invalid @elseif( old('jawatan_id')) is-valid @enderror"
                        name="jawatan_id">

                            <option value="">--Sila Pilih--</option>

                            @foreach ($senaraiJawatan as $jawatan)
                            <option value="{{ $jawatan->id }}" {{ (old('jawatan_id') ?? $user->jawatan_id) == $jawatan->id ? 'selected' : NULL }}>{{ $jawatan->name }}</option>
                            @endforeach

                        </select>

                        @error('jawatan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Pengguna</label>
                        <input type="email" class="form-control @error('email') is-invalid @elseif( old('email') ) is-valid @enderror" name="email" value="{{ old('email') ?? $user->email ?? NULL }}">

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-md">

                            <div class="mb-3">
                                <label class="form-label">Katalaluan Pengguna</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md">

                            <div class="mb-3">
                                <label class="form-label">Sahkan Katalaluan Pengguna</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation">

                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md">

                            <div class="mb-3">
                                <label class="form-label">No. IC</label>
                                <input type="text" class="form-control @error('nric') is-invalid @elseif( old('nric') ) is-valid @enderror" name="nric" value="{{ old('nric') ?? $user->no_ic ?? NULL }}">

                                @error('nric')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md">

                            <div class="mb-3">
                                <label class="form-label">No. Staff</label>
                                <input type="text" class="form-control @error('no_staff') is-invalid @elseif( old('no_staff') ) is-valid @enderror" name="no_staff" value="{{ old('no_staff') ?? $user->no_staff ?? NULL }}">

                                @error('no_staff')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md">

                            <div class="mb-3">
                                <label class="form-label">Bahagian</label>
                                <select class="form-select @error('bahagian_id') is-invalid @elseif( old('bahagian_id') ) is-valid @enderror" name="bahagian_id">
                                    <option value="">--Sila Pilih--</option>

                                    @foreach ($senaraiBahagian as $bahagian)
                                    <option value="{{ $bahagian->id }}" {{ (old('bahagian_id') ?? $user->bahagian_id) == $bahagian->id ? 'selected' : NULL }}>{{ $bahagian->name }}</option>
                                    @endforeach
                                </select>

                                @error('bahagian_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md">

                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <select class="form-select @error('unit_id') is-invalid @elseif( old('unit_id') ) is-valid @enderror" name="unit_id">
                                    <option value="">--Sila Pilih--</option>

                                    @foreach ($senaraiUnit as $unit)
                                    <option value="{{ $unit->id }}" {{ (old('unit_id') ?? $user->unit_id)== $unit->id ? 'selected' : NULL }}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>

                                @error('unit_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md">

                            <div class="mb-3">
                                <label class="form-label">Level</label>
                                <select class="form-select @error('level') is-invalid @elseif( old('level') ) is-valid @enderror" name="level">
                                    <option value="">--Sila Pilih--</option>

                                    @for($i = 1; $i <= 22; $i++)

                                        <option value="{{ $i }}" {{ (old('level') ?? $user->level) == $i ? 'selected' : '' }}>{{ $i }}</option>

                                    @endfor

                                </select>

                                @error('level')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md">

                            <div class="mb-3">
                                <label class="form-label">No. Phone</label>
                                <input type="text" class="form-control @error('no_phone') is-invalid @elseif( old('no_phone') ) is-valid @enderror" name="no_phone" value="{{ old('no_phone') ?? $user->no_phone ?? NULL }}">

                                @error('no_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
