@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Karyawan</h1>

        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $karyawan->nama }}">
            </div>

            <!-- Tambahkan elemen form lainnya sesuai dengan atribut yang ingin diubah -->

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
