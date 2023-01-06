@extends('layouts.master')

@section('content')
<div class="container pb-15" style="height: 800px">
    <h4 class="mt-5">Edit Data</h4>
    @if (count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                
    @endif
    <form action="{{ route('mahasiswa.update', $data_mahasiswa->id) }}" method="POST" style="width: 50%" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-5">
          <label class="form-label fw-bold">Nama Mahasiswa</label>
          <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="{{ $data_mahasiswa->nama }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" autocomplete="off" value="{{ $data_mahasiswa->nim }}">
          </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" autocomplete="off" value="{{ $data_mahasiswa->tempat_lahir }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off" value="{{ date('Y-m-d',strtotime($data_mahasiswa->tanggal_lahir)) }}">
        </div>
        <div class="mb-3">
            <label class=" fw-bold" for="">Program Studi</label>
                <select name="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
                    <option  value="option_select">Pilih Program Studi</option>
                    @foreach ($data_prodi as $data)
                        <option value="{{ $data->id }}" {{ $data_mahasiswa->prodi_id == $data->id ? 'selected' : '' }}>{{ $data->nama_prodi }}</option>
                    @endforeach
                </select>
                @error('prodi_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mb-3">
            <label class=" fw-bold" for="">Kelas</label>
                <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                    <option value="option_select">Pilih Kelas</option>
                    @foreach ($data_kelas as $data)
                        <option value="{{ $data->id }}" {{ $data_mahasiswa->kelas_id == $data->id ? 'selected' : ''}}>{{ $data->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('prodi_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Angkatan</label>
            <input type="text" class="form-control" id="angkatan" name="angkatan" autocomplete="off"  value="{{ $data_mahasiswa->angkatan }}">
        </div>
        <div class="mb-3">
            <label class="fw-bold" for="semester font-weight-bold">Semester</label>
            <select class="form-control" id="semester" name="semester">
                <option value="">Semester</option>
                <option value="1" {{ $data_mahasiswa->semester == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ $data_mahasiswa->semester == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ $data_mahasiswa->semester == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ $data_mahasiswa->semester == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ $data_mahasiswa->semester == 5 ? 'selected' : '' }}>5</option>
                <option value="6" {{ $data_mahasiswa->semester == 6 ? 'selected' : '' }}>6</option>
                <option value="7" {{ $data_mahasiswa->semester == 7 ? 'selected' : '' }}>7</option>
                <option value="8" {{ $data_mahasiswa->semester == 8 ? 'selected' : '' }}>8</option>
                <option value="8 keatas" {{ $data_mahasiswa->semester == "8 keatas" ? 'selected' : '' }}>8 keatas</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Foto</label>
            <br><img src="{{ asset('images/'.$data_mahasiswa->image) }}" style="width: 100px">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label fw-bold">Foto</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/png, image/jpg, image/jpeg">
            <label>*) Jika Tidak diganti kosongkan saja</label>
          </div>

        <button type="submit" class="btn btn-primary mb-5">Submit</button>
        <a class="btn btn-secondary mb-5" href="/mahasiswa">Batal</a>
      </form>
</div>

@endsection

