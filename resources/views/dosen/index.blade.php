{{-- {{ dump($data) }} --}}
@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5">Data Dosen</h1>

<div class="text-right pt-5">
    @auth
    <a href="/dosen/create" class="btn btn-primary">
    Tambah Jurusan</a>
    @endauth
</div>

<div class="container">

    <table class="table table-condensed">
    <tr>
        <th style="width: 10px">#</th>
        <th>NID</th>
        <th>Nama</th>
        <th>Jurusan Dosen</th>
        @auth
        <th>Action</th>@endauth
    </tr>
    @foreach ($dosens as $dosen)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$dosen->nid}}</td>
        <td>
            <a href="/dosen/show/{{$dosen->id}}">{{$dosen->nama}}</a>
            {{-- <a href="{{ route('dosens.show',['dosen' => $dosen->id]) }}">{{$dosen->nama}}</a> --}}
        </td>
        <td>{{$dosen->jurusan->nama}}</td>
        @auth
        <td><a href="/dosen/edit/{{$dosen->id}}" class="btn btn-success"> EDIT</a>
            <a href="/dosen/destroy/{{$dosen->id}}" class="btn btn-danger">Delete</a></td>@endauth
    </tr>
    @endforeach
    </table>

</div>
@endsection
