@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white shadow p-6 rounded">

        <h1 class="text-2xl font-bold mb-4">Tambah Kelas</h1>

        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf

            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="w-full border p-2 mb-4">

            <label>Instruktur</label>
            <input type="text" name="instruktur" class="w-full border p-2 mb-4">

            <label>Deskripsi</label>
            <textarea name="deskripsi" class="w-full border p-2 mb-4"></textarea>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>

    </div>
@endsection
