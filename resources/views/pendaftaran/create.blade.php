@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-6 bg-white p-6 shadow rounded">

        {{-- Tombol Back --}}
        <a href="{{ route('peserta.show', $peserta->id) }}"
            class="inline-block mb-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            ← Kembali
        </a>

        <h2 class="text-xl font-bold mb-4">Kelola Kelas Peserta</h2>

        <form id="form-daftar" action="{{ route('pendaftaran.store') }}" method="POST">
            @csrf

            <input type="hidden" name="peserta_id" value="{{ $peserta->id }}">

            <div class="space-y-2">
                @foreach ($kelas as $k)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="kelas_id[]" value="{{ $k->id }}"
                            {{ $peserta->kelas->contains($k->id) ? 'checked' : '' }}>
                        {{ $k->nama_kelas }}
                    </label>
                @endforeach
            </div>

            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
                Simpan Perubahan
            </button>
        </form>
    </div>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection
