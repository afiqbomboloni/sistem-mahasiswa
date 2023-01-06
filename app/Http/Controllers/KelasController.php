<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $no = 0;
        $data_kelas = Kelas::all();
        return view('kelas.index', compact('data_kelas','no'));

    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kelas' => 'required|unique:kelas',
           ]);
        $data_kelas = new Kelas;
        $data_kelas->nama_kelas = $request->nama_kelas;

        $data_kelas->save();
        return redirect('/kelas')->with('pesan', 'Data Prodi Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data_kelas = Kelas::findOrFail($id);
        $data_kelas->delete();
        return redirect('/kelas')->with('pesan', 'Data Prodi Berhasil Dihapus');
    }

    public function edit($id)
    {
        $data_kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('data_kelas'));
    }

    public function update(Request $request, $id)
    {
        $data_kelas = Kelas::findOrFail($id);
        $data_kelas->nama_kelas = $request->nama_kelas;
        $data_kelas->update();
        return redirect('/kelas')->with('pesan', 'Data Prodi Berhasil Diupdate');
    }
}
