@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-6">
        <h2 class="text-2xl font-bold mb-4">Edit Peserta</h2>

        <div class="bg-white shadow rounded p-6">
            <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="block mb-2">Nama</label>
                <input type="text" name="nama" value="{{ $peserta->nama }}" class="border p-2 w-full rounded mb-4">

                <label class="block mb-2">Email</label>
                <input type="email" name="email" value="{{ $peserta->email }}" class="border p-2 w-full rounded mb-4">

                <label class="block mb-2">Telepon</label>
                <input type="text" name="telepon" value="{{ $peserta->telepon }}" class="border p-2 w-full rounded mb-4">

                <label class="block mb-2">Alamat</label>
                <textarea name="alamat" class="border p-2 w-full rounded mb-4">{{ $peserta->alamat }}</textarea>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Simpan Perubahan
                </button>


                <a href="{{ route('peserta.index') }}" class="bg-gray-600 text-white px-3 py-1 rounded mb-4 inline-block">
                    Kembali
                </a>

            </form>
        </div>
    </div>
@endsection
