
@extends('layouts.app')
@section('content')
<div class="pt-3">
<h1 class="h2">Edit Tugas Akhir</h1>
</div>
<hr>
<form method="POST" action="/tugasakhir/update" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="id"value="{{$data->id}}">
    </div>
    <div class="form-group row">
        <label for="nid" class="col-md-3 col-form-label text-md-right" title="8 digit angka NIM">
            Nama Mahasiswa </label>
            <div class="col-md-6">
                <input id="nid" type="text" class="form-control col-md-8" value="{{$data->mahasiswa->nama}}" name="id" disabled>
            </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-md-3 col-form-label text-md-right">Judul sebelumnya</label>
        <div class="col-md-6">
            <p class="col-md-6">{{$data->judul}}</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-md-3 col-form-label text-md-right"> Judul Tugas Akhir</label>
        <div class="col-md-6">
            <textarea name="judul" id=""rows="2" class="form-control col-md-8"></textarea>
        </div>
    </div>

    <div class="form-group row mt-5">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection
