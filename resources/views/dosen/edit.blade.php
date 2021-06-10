
@extends('layouts.app')
@section('content')
<div class="pt-3">
<h1 class="h2">Edit Dosen</h1>
</div>
<hr>
<form method="POST" role="form" enctype="multipart/form-data" action="/dosen/update">
    <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="PUT" />
            <input type="hidden" name="id"value="{{$data->id}}">
    </div>
        <div class="form-group row">

        <label for="nid" class="col-md-3 col-form-label text-md-right" title="8 digit angka NID">
            Nomor Induk Dosen </label>
            <div class="col-md-6">
                <input id="nid" type="text" class="form-control col-md-8"
                name="nid" value="{{$data->nid}}" disabled>
            </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-md-3 col-form-label text-md-right"> Nama Dosen </label>
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
    <div class="form-group row mt-5">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection
