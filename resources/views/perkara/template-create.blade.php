@extends('template-induk')
{{-- @extends akan mencari template daripada folder resources/views --}}


@section('isi-kandungan-utama-disini')
{{-- Isi kandungan utama bermula --}}

<h1 class="mt-4">Perkara</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Daftar</li>
</ol>


{{-- Isi kandungan utama tamat disini --}}
@endsection


@push('js-script')

@endpush
