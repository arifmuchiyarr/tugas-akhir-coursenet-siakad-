
@extends('layouts.app')
@section('content')
<div class="pt-3">
<h1 class="h2">Tambah Dosen</h1>
</div>
<hr>
<form method="POST" action="/dosen/store">
    <div class="form-group row">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="POST" />
        </div>
    </div>
    <div class="form-group row">
        <label for="nid" class="col-md-3 col-form-label text-md-right" title="8 digit angka NID">
            Nomor Induk Dosen </label>
            <div class="col-md-6">
                <input id="nid" type="text" class="form-control col-md-8" name="nid" placeholder="NID Minimal 8 angka" ><br>
                @error('nid')
                  <div class="alert alert-danger">{{$message}}</div>
                @enderror
        </div>

    </div>
    <div class="form-group row">
        <label for="nama" class="col-md-3 col-form-label text-md-right"> Nama Dosen </label>
        <div class="col-md-6">
        <input id="nama" type="text" class="form-control col-md-8" name="nama"><br>
        @error('nama')
                  <div class="alert alert-danger">{{$message}}</div>
        @enderror
        </div>

    </div>

    <div class="form-group row">
        <label for="jurusan_id" class="col-md-3 col-form-label text-md-right">Jurusan </label>
        <div class="col-md-6">
            <select name="jurusan_id" id="jurusan_id" class="custom-select col-md-5">
                @foreach ($jurusan as $jurusan)
                     <option value="{{ $jurusan->id }}" >{{ $jurusan->nama }}</option>
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
