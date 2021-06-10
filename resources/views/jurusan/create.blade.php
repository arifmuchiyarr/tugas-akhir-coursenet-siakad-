
@extends('layouts.app')
@section('content')
<div class="pt-3">
<h1 class="h2">Tambah Jurusan</h1>
</div>
<hr>
<form method="POST" action="/jurusan/store">
    <div class="form-group row">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="POST" />
        </div>
        <label for="nid" class="col-md-3 col-form-label text-md-right" title="8 digit angka NID">
            Nama Jurusan</label>
            <div class="col-md-6">
                <input id="nid" type="text" class="form-control col-md-8"
                name="nama" >
            </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-md-3 col-form-label text-md-right">Kepala Jurusan</label>
        <div class="col-md-6">
        <input id="nama" type="text" class="form-control col-md-8" name="kepala_jurusan">
        </div>
    </div>

    <div class="form-group row">
        <label for="nama" class="col-md-3 col-form-label text-md-right">Jumlah Tampung</label>
        <div class="col-md-6">
        <input id="nama" type="number" class="form-control col-md-8" name="daya_tampung">
        </div>
    </div>

    <div class="form-group row mt-5">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </div>
</form>
@endsection
