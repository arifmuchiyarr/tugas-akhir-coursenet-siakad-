<?php

namespace App\Http\Controllers;

use App\Tugasakhir;
use App\Mahasiswa;
use Illuminate\Http\Request;

class TugasakhirController extends Controller
{

    public function index()
    {
        $tugasakhir = Tugasakhir::all();
        return view('tugasakhir.index', ["tugasakhir"=>$tugasakhir]);

    }


    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('tugasakhir.create', [
            'mahasiswa'=>$mahasiswa
        ]);
    }


    public function store(Request $request)
    {

        Tugasakhir::create([
            'mahasiswa_id'=>$request->mahasiswa_id,
            'judul'=>$request->judul,
        ]);
        return redirect('/tugasakhir');
    }


    public function show(Tugasakhir $tugasakhir)
    {
        //
    }


    public function edit($id)
    {
        $data = Tugasakhir::where('id', '=', $id)->first();
        $mahasiswa = Mahasiswa::all();
        return view('tugasakhir.edit', [
            'data' => $data,
            'mahasiswa' => $mahasiswa
        ]);
    }


    public function update(Request $request)
    {
        Tugasakhir::where('id', '=', $request->id)->update([
            'judul' => $request->judul,
        ]);

        return redirect('/mahasiswa');
    }

    public function destroy(Tugasakhir $tugasakhir)
    {
        //
    }
}
