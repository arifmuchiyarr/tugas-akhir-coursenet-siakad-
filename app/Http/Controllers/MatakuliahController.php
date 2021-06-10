<?php

namespace App\Http\Controllers;

use App\Matakuliah;
use App\Jurusan;
use App\Dosen;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{

    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('matakuliah.index',['matakuliahs' => $matakuliahs]);
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        $dosens = Dosen::all();
        return view('matakuliah.create',[
        'jurusans' => $jurusans,
        'dosens' => $dosens,
        ]);

        // $jurusan = Jurusan::all();
        // $dosen = Dosen::all();
        // return view('matakuliah.create', [
        //     'jurusan' => $jurusan,
        //     'dosen' => $dosen
        // ]);
    }

    public function store(Request $request)
    {
        Matakuliah::create([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'dosen_id' => $request->dosen_id,
            'jumlah_sks' => $request->jumlah_sks,
            'jurusan_id'=> $request->jurusan_id
        ]);
        return redirect('/matakuliah');
    }


    public function show($id)
    {
        $matakuliah = Matakuliah::find($id);
        $mahasiswas = $matakuliah->mahasiswas->sortBy('nama');
        return view('matakuliah.show',[
                    'matakuliah' => $matakuliah,
                    'mahasiswas' => $mahasiswas,
        ]);
    }

    public function edit($id)
    {
        $data = Matakuliah::where('id', '=', $id)->first();
        $jurusan = Jurusan::all();
        $dosen = Dosen::all();
        return view('matakuliah.edit', [
            'data' => $data,
            'jurusan' => $jurusan,
            'dosen' => $dosen,
        ]);
    }

    public function update(Request $request)
    {
        Matakuliah::where('id', '=', $request->id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'jumlah_sks' => $request->jumlah_sks,
            'dosen_id' => $request->dosen_id,
            'jurusan_id' => $request->jurusan_id
        ]);
        return redirect('/matakuliah');
    }


    public function destroy($id)
    {
        $data = Matakuliah::find($id);
        $data->delete();

        return redirect('/matakuliah');
    }

    public function buatMatakuliah(Dosen $dosen)
    {
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('matakuliah.create',[
                    'dosen' => $dosen,
                    'jurusans' => $jurusans,
        ]);
    }
}
