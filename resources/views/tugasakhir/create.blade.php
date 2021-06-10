
@extends('layouts.app')
@section('content')
<div class="pt-3">
<h1 class="h2">Tambah Tugas Akhir Mahasiswa</h1>
</div>
<hr>
<form method="POST" action="/tugasakhir/store">
    <div class="form-group row">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="POST" />
        </div>
    </div>


    <div class="form-group row">
        <label for="judul" class="col-md-3 col-form-label text-md-right"> Judul Tugas Akhir </label>
        <div class="col-md-6">
        <input type="text" class="form-control col-md-8" name="judul">
        </div>
    </div>

    <div class="form-group row">
        <label for="mahasiswa_id" class="col-md-3 col-form-label text-md-right">Nama Mahasiswa </label>
        @error('id')
                  <div class="alert alert-danger">{{$message}}</div>
            @enderror
        <div class="col-md-6">
            <select name="mahasiswa_id" id="mahasiswa_id" class="custom-select col-md-5">
                @foreach ($mahasiswa as $mahasiswa)
                     <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row mt-5">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </div>
</form>
@endsection
