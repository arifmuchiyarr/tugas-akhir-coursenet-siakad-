{{-- {{ dump($data) }} --}}
@extends('layouts.app')
@section('content')
<h1 class="display-4 text-center my-5">Data mahasiswa {{$nama_jurusan}}</h1>



<div class="container">

    <table class="table table-condensed">
    <tr>
        <th>#</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan Mahasiswa</th>

    </tr>
    @foreach ($mahasiswas as $mhs)
    <tr>
        <td>{{$mahasiswas->firstItem() + $loop->iteration - 1}}</td>
        <td>{{$mhs->nim}}</td>
        <td><a href="/mahasiswa/show/{{$mhs->id}}">{{$mhs->nama}}</a></td>
        <td>{{$mhs->jurusan->nama}}</td>
    </tr>
    @endforeach
    </table>
    <div class="row">
        <div class="mx-auto mt-3">
        {{ $mahasiswas->fragment('judul')->links() }}
        </div>
</div>
@endsection
