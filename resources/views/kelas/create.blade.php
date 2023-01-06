@extends('layouts.master')

@section('content')
<div class="container">
    <h4 class="mt-5">Tambah Data</h4>
    @if (count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                
    @endif
    <form style="width: 50%" action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama Kelas</label>
          <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="/kelas">Batal</a>
      </form>
</div>

@endsection

