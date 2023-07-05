<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;

class KaryawanController extends Controller

{
    public function create()
    {
        return view('karyawan.create');
    }

    // app/Http/Controllers/KaryawanController.php

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            // Tambahkan validasi untuk elemen form lainnya
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function destroy(Karyawan $karyawan)
    {

        $karyawan->absensi()->delete();

        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            // Add validation rules for other attributes you want to update
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->nama = $request->nama;
        // Update other attributes accordingly

        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query karyawan data with search condition
        $karyawan = Karyawan::where('nama', 'LIKE', "%$search%")->get();

        return view('karyawan.index', compact('karyawan'));
    }



}
