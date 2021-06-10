
@extends('layouts.app')
@section('content')
<div class="pt-3">
<h1 class="h2">Edit Matakuliah</h1>
</div>
<hr>
<form method="POST" action="/matakuliah/update">
    <div class="form-group row">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="PUT" />
            <input type="hidden" name="id"value="{{$data->id}}">
        </div>
        <label for="kode" class="col-md-3 col-form-label text-md-right">
            Kode Matakuliah </label>
            <div class="col-md-6">
                <input type="text" class="form-control col-md-8"
                name="kode" value="{{$data->kode}}">
            </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-md-3 col-form-label text-md-right"> Nama Matakuliah</label>
        <div class="col-md-6">
        <input id="nama" type="text" class="form-control col-md-8" name="nama" value="{{$data->nama}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="jurusan_id" class="col-md-3 col-form-label text-md-right">Jurusan </label>
        <div class="col-md-6">
            <select name="jurusan_id" id="jurusan_id" class="custom-select col-md-5">
                <option value="{{ $data->jurusan_id }}" selected>{{ $data->jurusan->nama }}</option>
                @foreach ($jurusan as $jur)
                    @if ($data->jurusan_id != $jur->id)
                        <option value="{{$jur->id}}">{{$jur->nama}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="dosen_id" class="col-md-3 col-form-label text-md-right">Pengajar </label>
        <div class="col-md-6">
            <select name="dosen_id"  class="custom-select col-md-5">
                <option value="{{$data->dosen_id}}"selected>{{$data->dosen->nama}}</option>
                @foreach ($dosen as $dos)
                    @if ($data->dosen_id != $dos->id)
                        <option value="{{ $dos->id }}">{{ $dos->nama }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="jumlah_sks" class="col-md-3 col-form-label text-md-right">Jumlah SKS</label>
        <div class="col-md-2">
        <input id="jumlah_sks" type="number" class="form-control col-md-8" name="jumlah_sks" value="{{$data->jumlah_sks}}">
        </div>
    </div>

    <div class="form-group row mt-5">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </div>
</form>
@endsection
