<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;


class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $absensi = Absensi::query()
            ->join('karyawan', 'karyawan.id', '=', 'absensi.karyawan_id')
            ->where(function ($query) use ($keyword) {
                $query->where('karyawan.nama', 'LIKE', "%$keyword%")
                      ->orWhere('absensi.tanggal', 'LIKE', "%$keyword%");
            })
            ->paginate(10);

        return view('absensi.index', compact('absensi'));
    }


    public function create()
{
    $karyawan = \App\Models\Karyawan::all();

    return view('absensi.create', compact('karyawan'));
}


    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $absensi = Absensi::query()
            ->join('karyawan', 'karyawan.id', '=', 'absensi.karyawan_id')
            ->where(function ($query) use ($search) {
                $query->where('karyawan.nama', 'like', '%'.$search.'%')
                    ->orWhere('absensi.tanggal', 'like', '%'.$search.'%');
            })
            ->paginate(10);

        return view('absensi.index', compact('absensi'));
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}



