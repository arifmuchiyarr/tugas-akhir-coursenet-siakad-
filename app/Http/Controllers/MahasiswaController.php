<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Jurusan;
use App\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index',['mahasiswas' => $mahasiswas]);
    }


    public function create()
    {
        $jurusan = Jurusan::all();
        return view('mahasiswa.create',[
            'jurusan'=>$jurusan
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas,nim',
            'nama' => 'required|min:5',
            ]);

        Mahasiswa::create([
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jurusan_id'=>$request->jurusan_id
        ]);

        return redirect('/mahasiswa');
    }


    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $matakuliahs = $mahasiswa->matakuliahs->sortBy('nama');
        return view('mahasiswa.show',[
        'mahasiswa' => $mahasiswa,
        'matakuliahs' => $matakuliahs,
        ]);
    }

    public function edit($id)
    {
        $data = Mahasiswa::where('id', '=', $id)->first();
        $jurusan = Jurusan::all();
        return view('mahasiswa.edit', [
            'data' => $data,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Mahasiswa::where('id', '=', $request->id)->update([
            'nim' => $request->nim,
            'nama'=> $request->nama,
            'jurusan_id' => $request->jurusan_id
        ]);

        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mahasiswa::find($id);
        $data->delete();

        return redirect('/mahasiswa');
    }

    public function ambilMatakuliah(Mahasiswa $mahasiswa)
    {
        // Ambil semua daftar mata kuliah dari jurusan yang sama dengan mahasiswa
        $matakuliahs = Matakuliah::where('jurusan_id',$mahasiswa->jurusan_id)->orderBy('nama')->get();
        // Buat array dari daftar jurusan yang sudah di ambil mahasiswa
        // Ini akan dipakai untuk proses repopulate form
        $matakuliahs_sudah_diambil=$mahasiswa->matakuliahs->pluck('id')->all();
        return view('mahasiswa.ambil-matakuliah',
        [
            'mahasiswa' => $mahasiswa,
            'matakuliahs' => $matakuliahs,
            'matakuliahs_sudah_diambil' => $matakuliahs_sudah_diambil,
        ]);
    }

    public function prosesAmbilMatakuliah(Request $request, Mahasiswa $mahasiswa)
    {
        // Ambil semua id matakuliah untuk jurusan yang sama dengan mahasiswa.
        $matakuliah_jurusan=Matakuliah::where('jurusan_id',$mahasiswa->jurusan_id)->pluck('id')->toArray();

        $validateData = $request->validate([
                        'matakuliah.*' => 'distinct|in:'.implode(',',$matakuliah_jurusan),
                         ]);
        // Input ke database
        $mahasiswa->matakuliahs()->sync($validateData['matakuliah'] ?? []);
        // dd($matakuliah_jurusan);
        // return redirect('/mahasiswa');
        return redirect('mahasiswa.show',
        ['mahasiswa' => $mahasiswa->id]);
    }

}
