@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Daftar Peserta</h1>
            <a href="{{ route('peserta.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                Tambah Peserta
            </a>
        </div>

        <div class="bg-white shadow rounded">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Telepon</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesertas as $p)
                        <tr>
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3">{{ $p->nama }}</td>
                            <td class="p-3">{{ $p->email }}</td>
                            <td class="p-3">{{ $p->telepon }}</td>
                            <td class="p-3">

                                <a href="{{ route('peserta.show', $p->id) }}" class="text-blue-600">Detail</a> |

                                <a href="{{ route('peserta.edit', $p->id) }}" class="text-yellow-600">Edit</a> |

                                <a href="{{ route('pendaftaran.create', ['peserta_id' => $p->id]) }}"
                                    class="text-green-600">
                                    Daftar Kelas
                                </a> |

                                <form action="{{ route('peserta.destroy', $p->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus peserta ini?')" class="text-red-600">
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
            {{ $pesertas->links() }}
        </div>

    </div>
@endsection
