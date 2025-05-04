<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::with('pengguna', 'kegiatan')->get();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    public function create()
    {
        $kegiatan = Kegiatan::all();
        return view('pendaftaran.create', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatan,id',
        ]);

        Pendaftaran::create([
            'pengguna_id' => Auth::id(),
            'kegiatan_id' => $request->kegiatan_id,
        ]);

        return redirect()->route('pendaftaran.index')->with('success', 'Berhasil mendaftar kegiatan.');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran dihapus.');
    }
}
