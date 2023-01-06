@extends('layouts.master')

@section('content')
<div class="container mt-3">
    @if (Session::has('pesan'))
    <div class="alert alert-success">
        {{ Session::get('pesan') }}
    </div>
    
    @endif
    <a href="{{ route('mahasiswa.create') }}"
    class="btn btn-primary mt-3 mb-3">
    <i class="bi bi-plus"></i>
    Tambah Mahasiswa
    </a>
    <h4>Daftar Mahasiswa
        
    </h4>
    <form action="{{ route('mahasiswa.search') }}" method="GET">@csrf
        <div class="form-group mt-5">
            <input type="text" name="word" placeholder="Nama, angkatan, semester" autocomplete="off">
        </div>
    
    </form>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="font-size: 14px">No</th>
                <th style="font-size: 14px">@sortablelink('nama')</th>
                <th style="font-size: 14px">NIM</th>
                <th style="font-size: 14px">@sortablelink('prodi_id')</th>
                <th style="font-size: 14px">@sortablelink('kelas_id')</th>
                <th style="font-size: 14px">@sortablelink('angkatan')</th>
                <th style="font-size: 14px">@sortablelink('semester')</th>
                <th style="font-size: 14px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_mahasiswa as $mahasiswa)
                <tr class="table-row" data-href="{{ route('mahasiswa.show', $mahasiswa->id) }}" style="cursor: pointer">
                    <td style="font-size: 12px">{{ ++$no }}</td>
                    <td>
                        <div class="d-flex align-items-center">

                            <img
                                src="{{ asset('images/'.$mahasiswa->image) }}"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle mr-1"
                                />
                            
                          
                          <div class="ms-3">
                            <p class="font-weight-bold mb-1">{{ $mahasiswa->nama }}</p>
                            <p class="text-muted mb-0" style="font-size: 11px">{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir->format('d M Y') }}</p>
                          </div>
                        </div>
                   
                </td>      
                                
                    <td style="font-size: 12px">{{ $mahasiswa->nim }}</td>
                    <td style="font-size: 12px">{{ $mahasiswa->prodi->nama_prodi }}</td>
                    <td style="font-size: 12px">{{ $mahasiswa->kelas->nama_kelas }}</td>
                    <td style="font-size: 12px">{{ $mahasiswa->angkatan }}</td>
                    <td style="font-size: 12px">{{ $mahasiswa->semester }}</td>
                    <td>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">@csrf
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-success"><i class="bi bi-pen"></i>Edit</a>
                            <button class="btn btn-danger bi bi-trash" onclick="return confirm('Yakin Mau dihapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>Jumlah Mahasiswa: {{ $total }}</div>
    <div>{{ $data_mahasiswa->links('pagination::bootstrap-4') }}</div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function($) {
    $(".table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>



@endsection