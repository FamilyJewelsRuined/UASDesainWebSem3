<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar;

class DaftarController extends Controller
{
    public function index()
    {
        // Fetch all daftars from the database
        $daftars = Daftar::all();
        return view('daftar', compact('daftars'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255|unique:daftars,nik',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        // Create a new record in the daftars table
        Daftar::create($request->all());

        // Redirect with success message
        return redirect()->route('daftar.index')->with('success', 'Daftar berhasil disimpan!');
    }
}
