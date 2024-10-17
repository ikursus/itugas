@extends('template-induk')
{{-- @extends akan mencari template daripada folder resources/views --}}


@section('isi-kandungan-utama-disini')
{{-- Isi kandungan utama bermula --}}

<h1 class="mt-4">Jawatan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Senarai</li>
</ol>

<div class="row">

    <div class="col">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Senarai Jawatan
            </div>
            <div class="card-body">

                @include('template-alerts')

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-1">#</th>
                            <th class="col-8">Nama Jawatan</th>
                            <th class="col-3">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach( $senaraiJawatan as $jawatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jawatan->name }}</td>
                            <td>
                                <a href="{{ route('jawatan.edit', $jawatan->id) }}" class="btn btn-info">Kemaskini</a>

                                <form action="{{ route('jawatan.destroy', $jawatan->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Adakah anda pasti untuk padamkan data ini: {{ $jawatan->name }}?')">Padam</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                {{-- links() hanya boleh digunakan jika senaraijawatan menggunakan ->paginate() di dalam controller --}}
                {{ $senaraiJawatan->links() }}
            </div>
        </div>

    </div>

</div>

{{-- Isi kandungan utama tamat disini --}}
@endsection


@push('js-script')

@endpush
