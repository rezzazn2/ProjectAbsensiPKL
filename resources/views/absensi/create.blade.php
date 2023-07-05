<!-- resources/views/absensi/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">


        <h1>Tambah Absensi</h1>

        <!-- Form untuk menambahkan absensi -->

        <form method="POST" action="{{ route('absensi.store') }}">
            @csrf

            <div class="form-group">
                <label for="karyawan_id">Karyawan:</label>
                <select name="karyawan_id" id="karyawan_id" class="form-control">
                    @foreach ($karyawan as $kar)
                        <option value="{{ $kar->id }}">{{ $kar->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>

            <div class="form-group">
                <label for="jam_masuk">Jam Masuk:</label>
                <input type="time" name="jam_masuk" id="jam_masuk" class="form-control">
            </div>

            <div class="form-group">
                <label for="jam_keluar">Jam keluar:</label>
                <input type="time" name="jam_keluar" id="jam_keluar" class="form-control">
            </div>

            <!-- Tambahkan elemen form lainnya -->

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>


    </div>
@endsection

