@extends('layouts.master')

@section('content')
<div class="container">
    <h4 class="mt-5">Edit Data</h4>
    <form style="width: 50%" action="{{ route('prodi.update', $data_prodi->id) }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama Prodi</label>
          <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="{{ $data_prodi->nama_prodi }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="/prodi">Batal</a>
      </form>
</div>

@endsection

