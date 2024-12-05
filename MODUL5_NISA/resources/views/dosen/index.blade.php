@extends('layouts.app')

@section('content')
    {{-- Tombol Tambah Dosen --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('dosen.create') }}" class="btn btn-primary d-flex gap-2">
            <div class=""><span class="material-symbols-rounded fs-6">add</span></div> Tambah Dosen
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabel Data Dosen --}}
    <div class="card">
        <div class="card-header">
            <h5>Daftar Dosen</h5>
        </div>
        <div class="card-body">
            @if ($dosen->isEmpty())
                <p class="text-center">Belum ada data dosen.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Dosen</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->kode_dosen }}</td>
                                <td>{{ $data->nama_dosen }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->no_telp }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dosen.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('dosen.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('dosen.destroy', $data->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
