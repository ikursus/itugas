@extends('template-induk')
{{-- @extends akan mencari template daripada folder resources/views --}}


@section('isi-kandungan-utama-disini')
{{-- Isi kandungan utama bermula --}}

<h1 class="mt-4">Users</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Senarai</li>
</ol>

<div class="row">

    <div class="col">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Senarai Users
            </div>
            <div class="card-body">

                @include('template-alerts')

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Jawatan</th>
                            <th>Bahagian</th>
                            <th>Unit</th>
                            <th>Aras</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($senaraiUsers as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->jawatan->name ?? "Belum set jawatan" }}</td>
                            <td>{{ $user->bahagian->name ?? "Belum set bahagian"  }}</td>
                            <td>{{ $user->unit->name ?? "Belum set unit"  }}</td>
                            <td>{{ $user->level }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Adakah anda pasti untuk padamkan data ini: {{ $user->name }}?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>


{{-- Isi kandungan utama tamat disini --}}
@endsection


@push('js-script')

@endpush
