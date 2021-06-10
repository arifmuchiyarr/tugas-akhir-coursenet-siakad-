{{-- {{ dump($data) }} --}}
@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5">Data Mata Kuliah</h1>

<div class="text-right py-4">
    @auth
    <a href="/matakuliah/create" class="btn btn-primary">Tambah Mata Kuliah</a>
    @endauth
    </div>

<div class="container">

    <table class="table table-condensed">
    <tr>
        <th style="width: 10px">#</th>
        <th>Kode</th>
        <th>Nama Matakuliah</th>
        <th>Pengajar</th>
        <th>Jumlah SKS</th>
        <th>Jurusan</th>
        @auth<th>Action</th>@endauth
    </tr>
    @foreach ($matakuliahs as $matakuliah)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$matakuliah->kode}}</td>
        <td><a href="/matakuliah/show/{{$matakuliah->id}}">{{$matakuliah->nama}}</a></td>
        <td><a href="/dosen/show/{{$matakuliah->dosen->id}}">{{$matakuliah->dosen->nama}}</td>
        <td>{{$matakuliah->jumlah_sks}}</td>
        <td>{{$matakuliah->jurusan->nama}}</td>@auth
        <td><a href="/matakuliah/edit/{{$matakuliah->id}}" class="btn btn-success"> EDIT<span class="glyphicon glyphicon-pencil"></a></span>
            <a href="/matakuliah/destroy/{{$matakuliah->id}}" class="btn btn-danger">Delete<span class="glyphicon glyphicon-trash"></span></a> </td>@endauth
    </tr>
    @endforeach
    </table>

</div>
@endsection
