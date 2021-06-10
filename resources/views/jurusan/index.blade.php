{{-- {{ dump($data) }} --}}
@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5">Data Jurusan</h1>
<div class="text-right pt-5">
    @auth
    <a href="/jurusan/create" class="btn btn-primary">
    Tambah Jurusan</a>
    @endauth
</div>
<div class="card-columns mt-3">
    @foreach($jurusans as $jurusan)
        <div class="card mt-1">
            <div class="card-body text-center">
                <h3 class="card-title py-1">{{ $jurusan->nama }}</h3>
                <hr>
                <div class="card-text py-1">Kepala Jurusan:
                <b>{{$jurusan->kepala_jurusan}}</b></div>
                <div class="card-text pb-4">
                    Total Mahasiswa: {{$jurusan->mahasiswas_count}}(daya tampung {{$jurusan->daya_tampung}})
                </div>
                <a href="{{ route('jurusan-dosen',['jurusan_id' => $jurusan->id]) }}"
                    class="btn btn-info btn-block">Dosen</a>
                <a href="{{ route('jurusan-mahasiswa',['jurusan_id' => $jurusan->id]) }}"
                    class="btn btn-success btn-block">Mahasiswa</a>
                {{-- <a href="/jurusan-dosen/{{$jurusan->jurusan_id}}" class="btn btn-info btn-block">Dosen</a>
                <a href="/jurusan-mahasiswa/{{$jurusan->jurusan_id}}"class="btn btn-success btn-block">Mahasiswa</a> --}}
            </div>
        </div>
    @endforeach
</div>


























{{-- <div class="text-right pt-5">
    <a href="jurusan/create" class="btn btn-info">Tambah Jurusan</a>
</div>

<div class="container">

    {{-- <table class="table table-condensed">
    <tr>
        <th style="width: 10px">#</th>
        <th>Nama Jurusan</th>
        <th>Kepala Jurusan</th>
        <th>Jumlah</th>
        <th>Action</th>
    </tr>
    @foreach ($jurusans as $jur)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$jur->nama}}</td>
        <td>{{$jur->kepala_jurusan}}</td>
        <td>{{$jur->daya_tampung}}</td>
        <td><a href="/jurusan/edit/{{$jur->id}}" class="btn btn-success">EDIT</a>
            <a href="/jurusan/destroy/{{$jur->id}}" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
    </table>

</div>--}}
@endsection
