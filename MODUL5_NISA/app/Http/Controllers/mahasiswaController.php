<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen; 
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $nav = 'Daftar Mahasiswa';

        return view('mahasiswa.index', compact('mahasiswa', 'nav'));
    }

    
    public function create()
    {
        $nav = 'Tambah Mahasiswa';
        
        $dosens = Dosen::all();  
        return view('mahasiswa.create', compact('nav', 'dosens'));  
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|max:100',
            'nama_mahasiswa' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'jurusan' => 'required|string|max:100',
            'dosen_id' => 'required|exists:dosen,id',
        ]);

        Mahasiswa::create($validatedData);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    
    public function show(Mahasiswa $mahasiswa)
    {
        $nav = 'Detail Mahasiswa - ' . $mahasiswa->nama_mahasiswa;
        return view('mahasiswa.show', compact('mahasiswa', 'nav'));
    }

    
    public function edit(Mahasiswa $mahasiswa)
{
    $nav = 'Edit Mahasiswa - ' . $mahasiswa->nama_mahasiswa;
    return view('mahasiswa.edit', compact('mahasiswa', 'nav'));
}

public function update(Request $request, Mahasiswa $mahasiswa)
{
    $validatedData = $request->validate([
        'nim' => 'required|string|max:100',
        'nama_mahasiswa' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'jurusan' => 'required|string|max:100',
    ]);

    $mahasiswa->update($validatedData);

    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
}

public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
