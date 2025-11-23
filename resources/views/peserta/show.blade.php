@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-6">
        <h2 class="text-2xl font-bold mb-4">Detail Peserta</h2>

        <div class="bg-white shadow rounded p-6">
            <p><strong>Nama:</strong> {{ $peserta->nama }}</p>
            <p class="mt-2"><strong>Email:</strong> {{ $peserta->email }}</p>
            <p class="mt-2"><strong>Telepon:</strong> {{ $peserta->telepon }}</p>
            <p class="mt-2"><strong>Alamat:</strong> {{ $peserta->alamat }}</p>
        </div>

        <div class="bg-white shadow rounded p-6 mt-6">
            <h3 class="text-xl font-bold mb-2">Kelas yang Diikuti</h3>

            @if ($peserta->kelas->isEmpty())
                <p class="text-gray-600">Belum terdaftar pada kelas manapun.</p>
            @else
                <ul class="list-disc ml-6">
                    @foreach ($peserta->kelas as $k)
                        <li>
                            <a class="text-blue-600" href="{{ route('kelas.show', $k->id) }}">
                                {{ $k->nama_kelas }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <br>
        <a href="{{ route('peserta.index') }}" class="bg-gray-600 text-white px-3 py-1 rounded mb-4 inline-block">
            Kembali
        </a>
    </div>
@endsection
