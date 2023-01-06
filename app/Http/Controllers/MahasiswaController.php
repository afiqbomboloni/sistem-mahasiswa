<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $limit = 5;
        $total = Mahasiswa::count();
        
        $data_mahasiswa = Mahasiswa::with('prodi', 'kelas')->sortable()->paginate($limit);
        $no = $limit * ($data_mahasiswa->currentPage() - 1);
        return view('mahasiswa.index', compact('data_mahasiswa', 'no', 'total'));
    }

    public function create()
    {
        $data_prodi = Prodi::all();
        $data_kelas = Kelas::all();
        return view('mahasiswa.create', compact('data_prodi','data_kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|unique:mahasiswa',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'prodi_id' => 'required',
            'kelas_id' => 'required',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'semester' => 'required',
            'angkatan' => 'required'
        ]);

        $data_mahasiswa = new Mahasiswa;
        $data_mahasiswa->nama = $request->nama;
        $data_mahasiswa->nim = $request->nim;
        $data_mahasiswa->prodi_id = $request->prodi_id;
        $data_mahasiswa->kelas_id = $request->kelas_id;
        $data_mahasiswa->tempat_lahir = $request->tempat_lahir;
        $data_mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $data_mahasiswa->semester = $request->semester;
        $data_mahasiswa->angkatan = $request->angkatan;

        $image = $request->image;
        $fileName = time().'.'.$image->getClientOriginalExtension();
        $image->move('images/', $fileName);

        $data_mahasiswa->image = $fileName;

        $data_mahasiswa->save();
        return redirect('/mahasiswa');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function destroy($id)
    {
        $data_mahasiswa = Mahasiswa::findOrFail($id);
        $data_mahasiswa->delete();
        return redirect('mahasiswa.index');
    }

    public function edit($id)
    {
        $data_mahasiswa = Mahasiswa::findOrFail($id);
        $data_kelas = Kelas::all();
        $data_prodi = Prodi::all();
        return view('mahasiswa.edit', compact('data_mahasiswa', 'data_prodi', 'data_kelas'));
    }

    public function update(Request $request, $id)
    {
        $data_mahasiswa = Mahasiswa::findOrFail($id);
        if($request->has('image'))
        {
            $data_mahasiswa->nama = $request->nama;
            $data_mahasiswa->nim = $request->nim;
            $data_mahasiswa->tempat_lahir = $request->tempat_lahir;
            $data_mahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $data_mahasiswa->kelas_id = $request->kelas_id;
            $data_mahasiswa->prodi_id = $request->prodi_id;
            $data_mahasiswa->semester = $request->semester;
            $data_mahasiswa->angkatan = $request->angkatan;
            
            $image = $request->image;
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $image->move('images/', $fileName);
            $data_mahasiswa->image = $fileName;

            
        } else {
            $data_mahasiswa->nama = $request->nama;
            $data_mahasiswa->nim = $request->nim;
            $data_mahasiswa->tempat_lahir = $request->tempat_lahir;
            $data_mahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $data_mahasiswa->kelas_id = $request->kelas_id;
            $data_mahasiswa->prodi_id = $request->prodi_id;
            $data_mahasiswa->semester = $request->semester;
            $data_mahasiswa->angkatan = $request->angkatan;

        }

        $data_mahasiswa->update();
        return redirect('/mahasiswa')->with('pesan', 'Data Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $limit = 5;
        $find = $request->word;
        $data_mahasiswa = Mahasiswa::where('nama', 'like', '%'.$find.'%')
        ->orwhere('angkatan', 'like', '%'.$find.'%')
        ->orwhere('semester', 'like', '%'.$find.'%')
        ->sortable()->paginate($limit);
        $no = $limit * ($data_mahasiswa->currentPage() - 1);
        return view('mahasiswa.search', compact('data_mahasiswa', 'no', 'find'));
    }

}
