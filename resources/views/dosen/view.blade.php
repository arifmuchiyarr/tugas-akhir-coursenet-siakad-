{{-- {{ dump($data) }} --}}
@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5">Data Dosen {{$nama_jurusan}}</h1>

<div class="text-right pt-5">
    <a href="jurusan/create" class="btn btn-info">Tambah Jurusan</a>
</div>

<div class="container">

    <table class="table table-condensed">
    <tr>
        <th style="width: 10px">#</th>
        {{-- <th>NID</th> --}}
        <th>Nama</th>
        <th>Jurusan Dosen</th>

    </tr>
    @foreach ($dosens as $dosen)
    <tr>
        <td>{{$loop->iteration}}</td>
        {{-- <td>{{$dosen->nid}}</td> --}}
        <td>{{$dosen->nama}}</a></td>
        <td>{{$dosen->jurusan->nama}}</td>
    </tr>
    @endforeach
    </table>

</div>
@endsection
