@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto">

        <h1 class="text-2xl font-bold mb-4">Daftar Peserta & Kelas yang Diikuti</h1>

        <div class="bg-white shadow rounded p-4">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Nama Peserta</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Kelas Diikuti</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($peserta as $p)
                        <tr class="border-b">
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3">{{ $p->nama }}</td>
                            <td class="p-3">{{ $p->email }}</td>

                            <td class="p-3">
                                @if ($p->kelas->count() > 0)
                                    <ul class="list-disc ml-5">
                                        @foreach ($p->kelas as $k)
                                            <li>{{ $k->nama_kelas }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-500">Belum terdaftar di kelas mana pun</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
