<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Kelas;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        // Ambil semua peserta beserta relasi kelasnya
        $peserta = Peserta::with('kelas')->get();

        return view('pendaftaran.index', compact('peserta'));
    }

    public function create(Request $request)
    {
        $peserta = Peserta::with('kelas')->findOrFail($request->peserta_id);
        $kelas = Kelas::all();

        return view('pendaftaran.create', compact('peserta', 'kelas'));
    }

    public function destroy($id)
    {
        try {
            $pendaftaran = Pendaftaran::findOrFail($id);
            $pesertaId = $pendaftaran->peserta_id;

            $pendaftaran->delete();

            return redirect()
                ->route('peserta.show', $pesertaId)
                ->with('success', 'Peserta berhasil dihapus dari kelas.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus kelas.');
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'peserta_id' => 'required|exists:pesertas,id',
            'kelas_id' => 'array',
            'kelas_id.*' => 'exists:kelas,id',
        ]);

        $peserta = Peserta::findOrFail($request->peserta_id);

        // Sync kelas yang dipilih
        $peserta->kelas()->sync($request->kelas_id ?? []);

        return redirect()
            ->route('peserta.show', $peserta->id)
            ->with('success', 'Kelas berhasil diperbarui untuk peserta ini.');
    }





    // public function index()
    // {
    //     $pendaftaran = Pendaftaran::with(['peserta', 'kelas'])->get();
    //     return view('pendaftaran.index', compact('pendaftaran'));
    // }

    // public function create()
    // {
    //     return view('pendaftaran.create', [
    //         'peserta' => Peserta::all(),
    //         'kelas'   => Kelas::all()
    //     ]);
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'peserta_id' => 'required|exists:pesertas,id',
    //         'kelas_id' => 'required|exists:kelas,id',
    //     ]);

    // try {
    //     Pendaftaran::create([
    //         'peserta_id' => $request->peserta_id,
    //         'kelas_id' => $request->kelas_id,
    //         'registered_at' => now(),
    //     ]);

    //     return redirect()->back()->with('success', 'Pendaftaran berhasil.');
    // } catch (\Illuminate\Database\QueryException $e) {
    //     if ($e->errorInfo[1] == 1062) { // duplicate entry
    //         return redirect()->back()->with('error', 'Peserta sudah terdaftar di kelas ini.');
    //     }

    //     return redirect()->back()->with('error', 'Terjadi kesalahan, silakan coba lagi.');
    // }
    // }

    // public function destroy($id)
    // {
    //     Pendaftaran::findOrFail($id)->delete();
    //     return back()->with('success', 'Pendaftaran berhasil dihapus.');
    // }

    // // daftar kelas yang diikuti peserta
    // public function pesertaKelas(Peserta $peserta)
    // {
    //     $kelas = $peserta->kelas; // many-to-many
    //     return view('pendaftaran.peserta_kelas', compact('peserta', 'kelas'));
    // }

    // // daftar peserta yang mengikuti kelas
    // public function kelasPeserta(Kelas $kelas)
    // {
    //     $peserta = $kelas->peserta; // many-to-many
    //     return view('pendaftaran.kelas_peserta', compact('kelas', 'peserta'));
    // }
}
