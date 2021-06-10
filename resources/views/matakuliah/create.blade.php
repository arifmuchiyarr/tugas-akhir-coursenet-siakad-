
@extends('layouts.app')
@section('content')

<hr>
<form method="POST" action="/matakuliah/store" style="padding-top: 2rem">
    <div class="form-group row">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="POST" />
        </div>
        <label for="kode" class="col-md-3 col-form-label text-md-right">
            Kode Matakuliah </label>
            <div class="col-md-6">
                <input type="text" class="form-control col-md-8"
                name="kode" >
            </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-md-3 col-form-label text-md-right"> Nama Matakuliah</label>
        <div class="col-md-6">
        <input id="nama" type="text" class="form-control col-md-8" name="nama">
        </div>
    </div>

    <div class="form-group row">
        <label for="jurusan_id" class="col-md-3 col-form-label text-md-right">Jurusan </label>
        <div class="col-md-6">
            <select name="jurusan_id"  class="custom-select col-md-5">
                @foreach ($jurusans as $jurusan)
                     <option value="{{ $jurusan->id }}" >{{ $jurusan->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="dosen_id" class="col-md-3 col-form-label text-md-right">
        Dosen Pengajar </label>
        @if (isset($dosen))
        <div class="col-md-6 d-flex align-items-center">
            <div>{{ $dosen->nama}} , Dosen {{$dosen->jurusan->nama}}</div>
        </div>
            {{-- Kirim id dosen ke form awal agar tidak bermasalah dengan validasi --}}
            <input type="hidden" name="dosen_id" id="dosen_id" value="{{$dosen->id}}">
            @else
        <div class="col-md-6">
            <select name="dosen_id" id="dosen_id" class="custom-select col-md-8">
                @foreach ($dosens as $dosen)
                    @if($dosen->id == (old('dosen_id') ?? $matakuliah->dosen->id ?? ''))
                        <option value="{{ $dosen->id }}">{{ $dosen->nama }} , Dosen {{$dosen->jurusan->nama}}</option>
                    @else
                        <option value="{{ $dosen->id }}">{{ $dosen->nama }} , Dosen {{$dosen->jurusan->nama}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        @endif
    </div>
    {{-- <div class="form-group row">
        <label for="dosen_id" class="col-md-3 col-form-label text-md-right">Pengajar </label>
        @if (isset($dosens))
            <div class="col-md-6 d-flex align-items-center">
                <div>{{ $dosens->nama}}</div>
            </div>
        {{-- Kirim id dosen ke form awal agar tidak bermasalah dengan validasi --}}
           {{-- <input type="hidden" name="dosen_id" id="dosen_id" value="{{$dosens->id}}">
        @else
        <div class="col-md-6">
            <select name="dosen_id"  class="custom-select col-md-5">
                @foreach ($dosens as $dos)
                     <option value="{{ $dos->id }}" >{{ $dos->nama }}</option>
                @endforeach
            </select>
        </div>
        @endif
    </div> --}}

    <div class="form-group row">
        <label for="jumlah_sks" class="col-md-3 col-form-label text-md-right">Jumlah SKS</label>
        <div class="col-md-2">
        <input id="jumlah_sks" type="number" class="form-control col-md-8" name="jumlah_sks">
        </div>
    </div>

    <div class="form-group row mt-5">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </div>
</form>
@endsection
