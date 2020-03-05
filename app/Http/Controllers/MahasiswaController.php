<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Dosen;
use DB;
use App\Hobi;
class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mhs = Mahasiswa::with('dosen')->get();
        // $mhs = DB::table('mahasiswas')
        // ->select('mahasiswas.*', 'dosens.nama as nama_dosen', 'dosens.nipd')
        // ->join('dosens', 'dosens.id', '=', 'mahasiswas.id_dosen')
        // ->get();
        // dd($mhs);
        return view('mahasiswa.index',compact('mhs'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        $hobi = Hobi::all();
        return view('mahasiswa.create',compact('dosen','hobi'));
    }

    public function store(Request $request)
    {
        $mhs = new Mahasiswa();
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->id_dosen = $request->id_dosen;
        $mhs->save();
        $mhs->hobi()->attach($request->hobi);
        return redirect()->route('mahasiswa.index')
                ->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show',compact('mhs'));
    }

    public function edit($id)
    {
        $dosen = Dosen::all();
        $mhs = Mahasiswa::findOrFail($id);
        $select = $mhs->hobi->pluck('id')->toArray();
        $hobi = Hobi::all();
        // dd($select);
        return view('mahasiswa.edit',compact('mhs','hobi','dosen','select'));
    }


    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->id_dosen = $request->id_dosen;
        $mhs->save();
        $mhs->hobi()->sync($request->hobi);
        return redirect()->route('mahasiswa.index')
                ->with(['message'=>'Data berhasil di edit']);
    }

    public function destroy($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->hobi()->detach();
        $mhs->delete();
        return redirect()->route('mahasiswa.index')
                ->with(['message'=>'Data berhasil dihapus']);
    }
}
