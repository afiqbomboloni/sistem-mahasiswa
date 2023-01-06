@extends('layouts.master')

@section('content')
<div class="container mt-3">
    @if (Session::has('pesan'))
    <div class="alert alert-success">
        {{ Session::get('pesan') }}
    </div>
    
    @endif
    <a href="{{ route('kelas.create') }}"
    class="btn btn-primary m-3">
    <i class="bi bi-plus"></i>
    Tambah Kelas
    </a>
    <h4>Daftar Kelas
        
    </h4>
    
    <table class="table table-striped" style="width: 50%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_kelas as $kelas)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $kelas->nama_kelas }}</td>
                    <td>
                        <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST">@csrf
                            <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-success"><i class="bi bi-pen"></i>Edit</a>
                            <button class="btn btn-danger bi bi-trash" onclick="return confirm('Ini Akan Menghapus semua user dengan kelas terkait')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection