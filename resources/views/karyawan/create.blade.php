@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Karyawan</h1>

        <form method="POST" action="{{ route('karyawan.store') }}">
            @csrf

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <!-- Tambahkan elemen form lainnya -->

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
