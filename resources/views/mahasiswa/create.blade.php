@extends('layouts.master')

@section('content')
<div class="container pb-15" style="height: 800px">
    <h4 class="mt-5">Tambah Data</h4>
    @if (count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                
    @endif
    <form action="{{ route('mahasiswa.store') }}" method="POST" style="width: 50%" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-5">
          <label class="form-label fw-bold">Nama Mahasiswa</label>
          <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" autocomplete="off">
          </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" autocomplete="off">
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off">
        </div>
        <div class="mb-3">
            <label class=" fw-bold" for="">Program Studi</label>
                <select name="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
                    <option value="">Pilih Program Studi</option>
                    @foreach ($data_prodi as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_prodi }}</option>
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
                    <option value="">Pilih Kelas</option>
                    @foreach ($data_kelas as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
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
            <input type="text" class="form-control" id="angkatan" name="angkatan" autocomplete="off">
        </div>
        <div class="mb-3">
            <label class="fw-bold" for="semester font-weight-bold">Semester</label>
            <select class="form-control" id="semester" name="semester">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>8 keatas</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label fw-bold">Foto</label>
            <input class="form-control" type="file" id="image" name="image" required accept="image/png, image/jpg, image/jpeg">
          </div>

        <button type="submit" class="btn btn-primary mb-5">Submit</button>
        <a class="btn btn-secondary mb-5" href="/kelas">Batal</a>
      </form>
</div>

@endsection

