@extends('layouts.app')
@section('content')
<div class="pt-3">
    <h1 class="h2 mr-4" style="padding-top: 3rem">Biodata Mahasiswa</h1>
</div>
<hr>
<ul>
    <li>Nama: <strong>{{$mahasiswa->nama}} </strong></li>
    <li>Nomor Induk Mahasiswa: <strong>{{$mahasiswa->nim}} </strong></li>
    <li>Jurusan: <strong>{{$mahasiswa->jurusan->nama}} </strong></li>
    <li>Total Mata Kuliah:
        <strong> {{count($matakuliahs)}}</strong>
        ({{ $matakuliahs->sum('jumlah_sks') }} SKS)
    </li>
    <li>Judul Tugas Akhir:<strong> {{$mahasiswa->tugasakhir->judul}}</strong></li>
</ul>
<p>Mengambil Mata Kuliah:</p>
<ol>
    @foreach ($matakuliahs as $matakuliah)
    <li>
        {{$matakuliah->nama}}
        <small>
        ({{$matakuliah->kode}}
        - {{$matakuliah->jumlah_sks}} SKS)
        </small>
    </li>
    @endforeach
</ol>
@auth
{{-- <a href="{{ route('ambil-matakuliah',['mahasiswa' => $mahasiswa->id])}}"
class="btn btn-info" title="Daftarkan Mata Kuliah">Ambil Mata Kuliah</a> --}}
@endauth
@endsection
