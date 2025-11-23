<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::latest()->paginate(10);
        return view('peserta.index', compact('pesertas'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pesertas,email',
            'telepon' => 'nullable|regex:/^[0-9]+$/',
            'alamat' => 'nullable|string',
        ]);

        Peserta::create($data);

        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load('kelas');
        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pesertas,email,' . $peserta->id,
            'telepon' => 'nullable|regex:/^[0-9]+$/',
            'alamat' => 'nullable|string',
        ]);

        $peserta->update($data);

        return redirect()->route('peserta.index')->with('success', 'Data peserta diperbarui.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success', 'Peserta dihapus.');
    }
}
