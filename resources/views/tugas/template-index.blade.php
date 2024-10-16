@extends('template-induk')
{{-- @extends akan mencari template daripada folder resources/views --}}


@section('isi-kandungan-utama-disini')
{{-- Isi kandungan utama bermula --}}

<h1 class="mt-4">Tugas</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Senarai</li>
</ol>

<div class="row">

    <div class="col">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Senarai Tugas
            </div>
            <div class="card-body">

                @include('template-alerts')

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-1">#</th>
                            <th class="col-4">Pegawai Bertugas</th>
                            <th class="col-5">Catatan Tambahan</th>
                            <th class="col-2">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($senaraiTugas as $tugas)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tugas->name ?? NULL }}</td>
                            <td>{{ $tugas->catatan_tambahan ?? NULL }}</td>
                            <td>
                                <a href="{{ route('tugas.show', $tugas->id) }}" class="btn btn-info">Lihat Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $senaraiTugas->links() }}
                {{-- {{ $senaraiTugas->render() }} --}}

            </div>
        </div>

    </div>

</div>

{{-- Isi kandungan utama tamat disini --}}
@endsection


@push('js-script')

@endpush
