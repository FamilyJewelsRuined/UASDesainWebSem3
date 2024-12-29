<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Jamaah;
use App\Models\JadwalKeberangkatan;
use App\Models\PaketUmroh;

class UmrohController extends Controller
{
    public function index()

        {
            $jamaah = Jamaah::all(); // Fetch Jamaah
            $jadwal = JadwalKeberangkatan::all(); // Fetch the schedule
            $packages = PaketUmroh::all(); // Fetch travel packages
            $registrations = Pendaftaran::with(['jamaah', 'jadwalKeberangkatan'])->get();
        
            return view('dashboard', compact('jamaah', 'jadwal', 'packages', 'registrations'));
        
        // Ambil data pendaftaran dengan relasi ke jamaah dan jadwal keberangkatan
        $registrations = Pendaftaran::with(['jamaah', 'JadwalKeberangkatan'])
            ->where('jamaah_id', auth()->id()) // Data berdasarkan jamaah yang login
            ->get();

        // Ambil semua data jamaah dan jadwal keberangkatan untuk form
        $jamaah = Jamaah::all();
        $jadwal = JadwalKeberangkatan::all();

        return view('dashboard', compact('registrations', 'jamaah', 'jadwal'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jamaah_id' => 'required|exists:jamaah,id',
            'paket_id' => 'required|exists:jadwalkeberangkatan,id',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|string',
        ]);

        // Simpan data ke tabel `pendaftaran`
        Pendaftaran::create([
            'jamaah_id' => $request->jamaah_id,
            'paket_id' => $request->paket_id,
            'tanggal_daftar' => $request->tanggal_daftar,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil disimpan!');
    }
}
