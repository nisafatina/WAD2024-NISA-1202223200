<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        $nav = 'Semua Dosen';

        return view('dosen.index', compact('dosen', 'nav'));
    }

    public function create()
    {
        $nav = 'Tambah Dosen';
        return view('dosen.create', compact('nav'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_dosen' => 'required|string|max:100',
            'nama_dosen' => 'required|string|max:100',
            'nip' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'no_telp' => 'required|string|max:15',
        ]);

        Dosen::create($validatedData);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
    {
        $nav = 'Detail Dosen - ' . $dosen->nama_dosen;
        return view('dosen.show', compact('dosen', 'nav'));
    }

    public function edit(Dosen $dosen)
    {
        $nav = 'Edit Dosen - ' . $dosen->nama_dosen;
        return view('dosen.edit', compact('dosen', 'nav'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validatedData = $request->validate([
            'kode_dosen' => 'required|string|max:100',
            'nama_dosen' => 'required|string|max:100',
            'nip' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'no_telp' => 'required|string|max:15',
        ]);

        $dosen->update($validatedData);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
