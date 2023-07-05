<!-- resources/views/absensi/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Absensi</h1>

        <div class="mb-3">
            <form action="{{ route('absensi.index') }}" method="GET" class="form-inline">
                <div class="form-group mr-2">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari Nama atau Tanggal">
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>



                <!-- resources/views/layouts/app.blade.php -->
        <!-- ... -->
        @if (Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        @endif
        <!-- ... -->


        <a href="{{ route('absensi.create') }}" class="btn btn-primary mb-3">Tambah Absensi</a>

        @if ($absensi->isEmpty())
    <p>Tidak ada data absensi yang ditemukan.</p>
@else
    <table class="table">
        <!-- Tampilan tabel absensi -->
        <table class="table table-striped">
            <thead>
                <tr>

                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $absen)
                    <tr>
                        <td>{{ $absen->karyawan->nama }}</td>
                        <td>{{ $absen->tanggal }}</td>
                        <td>{{ $absen->jam_masuk }}</td>
                        <td>{{ $absen->jam_keluar }}</td>
                        <td>
                            <form action="{{ route('absensi.destroy', $absen->karyawan_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </table>

    {{ $absensi->links() }}
@endif




    </div>
@endsection
