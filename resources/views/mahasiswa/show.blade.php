@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Mahasiswa Details</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Nama Mahasiswa</b></label>
                <div class="col-sm-10">
                    {{ $mahasiswa->nama }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>NIM</b></label>
                <div class="col-sm-10">
                    {{ $mahasiswa->nim }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Tempat Tanggal Lahir</b></label>
                <div class="col-sm-10">
                    {{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir->format('d M Y') }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Program Studi</b></label>
                <div class="col-sm-10">
                    {{ $mahasiswa->prodi->nama_prodi }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Kelas</b></label>
                <div class="col-sm-10">
                    {{ $mahasiswa->kelas->nama_kelas }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Angkatan</b></label>
                <div class="col-sm-10">
                    {{ $mahasiswa->angkatan }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Semester</b></label>
                <div class="col-sm-10">
                    {{ $mahasiswa->semester }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Foto Mahasiswa</b></label>
                <div class="col-sm-10">
                    <img src="{{ asset('images/'.$mahasiswa->image) }}" width="200" class="img-thumbnail" />
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection