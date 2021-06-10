
@extends('layouts.app')
@section('content')

<hr>
<form method="POST" action="/mahasiswa/store" style="padding-top: 2rem">
    <div class="form-group row">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="POST" />
        </div>
        <label for="nid" class="col-md-3 col-form-label text-md-right" title="8 digit angka NIM">
            Nomor Induk Mahasiswa </label>
            <div class="col-md-6">
                <input id="nid" type="text" class="form-control col-md-8 " name="nim" placeholder="NIM 8 angka" required><br>
                @error('nim')
                  <div class="alert alert-danger col-md-8 py-1">{{$message}}</div>
                @enderror
            </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-md-3 col-form-label text-md-right"> Nama Mahasiswa </label>
        <div class="col-md-6">
        <input id="nama" type="text" class="form-control col-md-8" name="nama" required><br>
        @error('nama')
                  <div class="alert alert-danger col-md-8 py-1">{{$message}}</div>
        @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="jurusan_id" class="col-md-3 col-form-label text-md-right">Jurusan </label>
        <div class="col-md-6">
            <select name="jurusan_id" id="jurusan_id" class="custom-select col-md-5">
                @foreach ($jurusan as $jurusan)
                     <option value="{{ $jurusan->id }}" selected>{{ $jurusan->nama }}</option>
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
