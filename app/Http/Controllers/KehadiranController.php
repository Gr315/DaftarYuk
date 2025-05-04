<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadiran = Kehadiran::with('pendaftaran.pengguna', 'pendaftaran.kegiatan')->get();
        return view('kehadiran.index', compact('kehadiran'));
    }

    public function update(Request $request, $id)
    {
        $kehadiran = Kehadiran::findOrFail($id);
        $kehadiran->update(['hadir' => $request->hadir]);

        return redirect()->route('kehadiran.index')->with('success', 'Status kehadiran diperbarui.');
    }
}
