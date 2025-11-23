@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Daftar Kelas</h1>
            <a href="{{ route('kelas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                Tambah Kelas
            </a>
        </div>

        <div class="bg-white shadow rounded">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Nama Kelas</th>
                        <th class="p-3">Instruktur</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $k)
                        <tr>
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3">{{ $k->nama_kelas }}</td>
                            <td class="p-3">{{ $k->instruktur }}</td>
                            <td class="p-3">

                                <a href="{{ route('kelas.show', $k->id) }}" class="text-blue-600">Detail</a> |

                                <a href="{{ route('kelas.edit', $k->id) }}" class="text-yellow-600">Edit</a> |

                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus kelas ini?')" class="text-red-600">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $kelas->links() }}
        </div>

    </div>
@endsection
