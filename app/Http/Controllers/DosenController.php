<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Jurusan;
use App\Matakuliah;
use Illuminate\Http\Request;

class DosenController extends Controller
{

    public function index()
    {
        $dosens = Dosen::all();
        return view('dosen.index',['dosens' => $dosens]);
    }


    public function create()
    {
        $jurusan = Jurusan::all();
        return view('dosen.create', [
            'jurusan'=>$jurusan
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nid' => 'required|size:8|unique:dosens,nid',
            'nama' => 'required|unique:dosens,nama',
            'jurusan_id' => 'required|exists:App\Jurusan,id',
            ]);

        Dosen::create([
            'nid'=>$request->nid,
            'nama'=>$request->nama,
            'jurusan_id'=> $request->jurusan_id
        ]);
        return redirect('/dosen');
    }

    // public function show($id)
    public function show($id)
    {
        $dosen = Dosen::find($id);
        // $matakuliahs= Matakuliah::where('dosen_id','=',$dosen->id);
        return view('dosen.show',compact('dosen'));
        // $matakuliahs = Matakuliah::all();
        // $dosens = Dosen::where('id', '=', $id)->first();
        // return view('dosen.show',['dosens' => $dosens]);
    }

    public function edit($id)
    {
        $data = Dosen::where('id','=',$id)->first();
        $jurusan = Jurusan::all();
        return view('dosen.edit',[
            'data' => $data,
            'jurusan' => $jurusan
        ]);

    }

    public function update(Request $request)
    {
        Dosen::where('id','=', $request->id)->update([
            'nid'=>$request->nid,
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan_id
        ]);
        return redirect('/dosen');
    }


    public function destroy($id)
    {
        $data = Dosen::find($id);
        $data->delete();

        return redirect('/dosen');
    }
}
