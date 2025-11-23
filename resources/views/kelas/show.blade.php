@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white shadow p-6 rounded">

        <h1 class="text-2xl font-bold mb-4">{{ $kelas->nama_kelas }}</h1>

        <p><strong>Instruktur:</strong> {{ $kelas->instruktur }}</p>
        <p class="mt-2"><strong>Deskripsi:</strong></p>
        <p>{{ $kelas->deskripsi }}</p>

        <a href="{{ route('kelas.index') }}" class="mt-4 inline-block bg-gray-300 px-4 py-2 rounded">
            Kembali
        </a>

        <hr class="my-6">

        <h3 class="text-xl font-bold mb-2">Peserta Terdaftar</h3>

        @if ($kelas->peserta->isEmpty())
            <p class="text-gray-600">Belum ada peserta yang mendaftar.</p>
        @else
            <ul class="list-disc ml-6">
                @foreach ($kelas->peserta as $p)
                    <li>
                        <a class="text-blue-600" href="{{ route('peserta.show', $p->id) }}">
                            {{ $p->nama }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

    </div>
@endsection
