{{-- {{ dump($data) }} --}}
@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5">Data Tugas Akhir Mahasiswa</h1>

<div class="text-right py-4">
    @auth
        <a href="/tugasakhir/create" class="btn btn-primary">Tambah Mata Kuliah</a>
    @endauth
</div>

<div class="container">

    <table class="table table-condensed">
    <tr>
        <th style="width: 10px">#</th>
        <th>Nama</th>
        <th>Judul Tugas akhir</th>
        @auth
        <th>Action</th>
        @endauth
    </tr>
    @foreach ($tugasakhir as $ta)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td><a href="/tugasakhir/show/{{$ta->id}}">{{$ta->mahasiswa->nama}}</a></td>
        <td>{{$ta->judul}}</td>
        @auth
        <td><a href="/tugasakhir/edit/{{$ta->id}}" class="btn btn-success"> EDIT</a></td>
        @endauth
    </tr>
    @endforeach
    </table>

</div>
@endsection
