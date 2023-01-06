<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $no = 0;
        $data_prodi = Prodi::all();
        return view('prodi.index', compact('data_prodi','no'));

    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_prodi' => 'required|unique:prodi',
           ]);
        $data_prodi = new Prodi;
        $data_prodi->nama_prodi = $request->nama_prodi;

        $data_prodi->save();
        return redirect('/prodi')->with('pesan', 'Data Prodi Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data_prodi = Prodi::findOrFail($id);
        $data_prodi->delete();
        return redirect('/prodi')->with('pesan', 'Data Prodi Berhasil Dihapus');
    }

    public function edit($id)
    {
        $data_prodi = Prodi::findOrFail($id);
        return view('prodi.edit', compact('data_prodi'));
    }

    public function update(Request $request, $id)
    {
        $data_prodi = Prodi::findOrFail($id);
        $data_prodi->nama_prodi = $request->nama_prodi;
        $data_prodi->update();
        return redirect('/prodi')->with('pesan', 'Data Prodi Berhasil Diupdate');
    }
}
