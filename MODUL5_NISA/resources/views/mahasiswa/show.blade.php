@extends('layouts.app')

@section('content')
    {{-- Tombol Kembali dan Aksi --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-primary d-flex gap-2">
            <div class="">
                <span class="material-symbols-rounded fs-6">school</span>
            </div> Daftar Mahasiswa
        </a>
        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-outline-primary">Edit</a>
        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-danger" 
                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
        </form>
    </div>

    {{-- Detail Data Mahasiswa --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Mahasiswa</h5>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" disabled>
            </div>
            <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                    value="{{ $mahasiswa->nama_mahasiswa }}" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}" disabled>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan }}" disabled>
            </div>
        </div>
    </div>
@endsection
