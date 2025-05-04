<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Peran;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::with('peran')->get();
        return view('pengguna.index', compact('pengguna'));
    }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $peran = Peran::all();
        return view('pengguna.edit', compact('pengguna', 'peran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'peran_id' => 'required|exists:peran,id',
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna dihapus.');
    }
}
