{{-- {{ dump($data) }} --}}
@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5">Data mahasiswa</h1>

<div class="text-right pt-5">
    @auth
    <a href="/mahasiswa/create" class="btn btn-primary">
    Tambah Mahasiswa</a>
    @endauth
</div>

<div class="container">

    <table class="table table-condensed">
    <tr>
        <th style="width: 10px">#</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan Mahasiswa</th>@auth
        <th>Action</th>@endauth
    </tr>
    @foreach ($mahasiswas as $mahasiswa)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$mahasiswa->nim}}</td>
        <td><a href="/mahasiswa/show/{{$mahasiswa->id}}">{{$mahasiswa->nama}}</a></td>
        <td>{{$mahasiswa->jurusan->nama}}</td>@auth
        <td><a href="/mahasiswa/edit/{{$mahasiswa->id}}" class="btn btn-success"> EDIT</a>
            <a href="/mahasiswa/destroy/{{$mahasiswa->id}}" class="btn btn-danger">Delete</a></td>@endauth
    </tr>
    @endforeach
    </table>

</div>
@endsection
