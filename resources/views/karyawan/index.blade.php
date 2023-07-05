<!-- resources/views/karyawan/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Karyawan</h1>

    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

    <form action="{{ route('karyawan.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama karyawan...">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>


    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th> <!-- Kolom untuk aksi edit dan hapus -->
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $karyawan)
                    <tr>
                            <td>{{ $karyawan->nama }}</td>
                            <td>
                                <!-- Tombol untuk mengarahkan ke halaman edit -->
                                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                <!-- Form untuk menghapus karyawan -->
                                <form method="POST" action="{{ route('karyawan.destroy', $karyawan->id) }}" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                    </tr>
                @endforeach

        </tbody>
    </table>
@endsection

