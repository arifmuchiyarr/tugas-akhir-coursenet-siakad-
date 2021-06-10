<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Dosen;
use App\Mahasiswa;
use Illuminate\Http\Request;

class JurusanController extends Controller
{

    public function index()
    {
        $jurusans = Jurusan::withCount('mahasiswas')->orderBy('nama')->get();
        return view('jurusan.index',['jurusans' => $jurusans]);
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $jurusan = new Jurusan;

        $jurusan->nama = $request->nama;
        $jurusan->kepala_jurusan = $request->kepala_jurusan;
        $jurusan->daya_tampung = $request->daya_tampung;
        $jurusan->save();

        return redirect('/jurusan');
    }

    public function show(Jurusan $jurusan)
    {
        //
    }

    public function edit(Jurusan $jurusan)
    {
        //
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        //
    }

    public function destroy(Jurusan $jurusan)
    {
        //
    }

    public function jurusanDosen($jurusan_id)
    {
        $dosens = Dosen::where('jurusan_id',$jurusan_id)->orderBy('nama')
        ->paginate(5);
        $nama_jurusan = Jurusan::find($jurusan_id)->nama;
        return view('dosen.view',[
        'dosens' => $dosens,
        'nama_jurusan' => $nama_jurusan,
        ]);
    }

    public function jurusanMahasiswa($jurusan_id)
    {
        $mahasiswas = Mahasiswa::where('jurusan_id',$jurusan_id)->orderBy('nama')
        ->paginate(5);
        $nama_jurusan = Jurusan::find($jurusan_id)->nama;
        return view('mahasiswa.view',[
                    'mahasiswas' => $mahasiswas,
                    'nama_jurusan' => $nama_jurusan,
        ]);
    }
}
