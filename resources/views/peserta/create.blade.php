@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 shadow rounded">

        <h1 class="text-2xl font-bold mb-4">Tambah Peserta</h1>

        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="font-medium">Nama</label>
                <input type="text" name="nama" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="font-medium">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="font-medium">Telepon</label>
                <input type="text" name="telepon" class="w-full border p-2 rounded" pattern="[0-9]+"
                    title="Nomor telepon hanya boleh angka">
            </div>

            <div class="mb-3">
                <label class="font-medium">Alamat</label>
                <textarea name="alamat" class="w-full border p-2 rounded"></textarea>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('peserta.index') }}" class="ml-3 text-gray-600">Batal</a>
        </form>

        @if ($errors->has('email'))
            <script>
                $(function() {
                    alert("Email sudah terdaftar!");
                });
            </script>
        @endif

    </div>
@endsection
