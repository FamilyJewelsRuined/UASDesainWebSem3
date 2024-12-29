<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Records;
use App\Models\PaketUmroh; // Import the PaketUmroh model

class RecordsController extends Controller
{
    public function create()
    {
        $paketUmroh = PaketUmroh::all(); // Fetch all paket_umroh records
        return view('records.create', compact('paketUmroh'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'field1' => 'required|string|max:255',
            'field2' => 'required|exists:paket_umroh,id', // Validate against paket_umroh table
            'field3' => 'required|string',
        ]);

        Records::create([
            'field1' => $validated['field1'],
            'field2' => $validated['field2'], // Save the selected paket ID
            'field3' => $validated['field3'],
        ]);

        return redirect()->route('records.create')->with('success', 'Record saved successfully!');
    }
}
