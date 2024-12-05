@extends('layouts.app')

@section('content')
    {{-- Tombol Kembali dan Aksi --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('dosen.index') }}" class="btn btn-outline-primary d-flex gap-2">
            <div class="">
                <span class="material-symbols-rounded fs-6">
                    person
                </span>
            </div> Daftar Dosen
        </a>
        <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-outline-primary">Edit</a>
        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-danger"
                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
        </form>
    </div>

    {{-- Detail Dosen --}}
    <div class="card">
        <div class="card-header">
            <h5>Detail Dosen</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="kode_dosen" class="form-label">Kode Dosen</label>
                <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" value="{{ $dosen->kode_dosen }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{ $dosen->nama_dosen }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ $dosen->nip }}" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $dosen->email }}" disabled>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $dosen->no_telp }}" disabled>
            </div>
        </div>
    </div>
@endsection
