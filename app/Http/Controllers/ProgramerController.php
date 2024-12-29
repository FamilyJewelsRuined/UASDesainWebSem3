<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programmer;  // Corrected namespace

class ProgramerController extends Controller
{
    // Display all programmers
    public function index()
    {
        $programmers = Programmer::all();  // Fetch all programmers
        return view('profil_kami', compact('programmers'));  // Pass to the view
    }



    // Store a new programmer (image upload functionality added)
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image file
        ]);

        $imagePath = null;

        // Check if there is an image file
        if ($request->hasFile('image')) {
            try {
                // Store the image in the 'public/images' directory and return the relative path
                $imagePath = $request->file('image')->store('images', 'public');
                
                // Log full file path (not just the relative one)
                \Log::info('Image uploaded to: ' . storage_path('app/public/' . $imagePath));
            } catch (\Exception $e) {
                \Log::error('Error uploading image: ' . $e->getMessage());
            }

            // Debugging: Check file information
            \Log::info('File received: ', [
                'name' => $request->file('image')->getClientOriginalName(),
                'size' => $request->file('image')->getSize(),
                'mime' => $request->file('image')->getMimeType(),
            ]);
        } else {
            // Default image if no file is uploaded
            $imagePath = 'images/default.jpg';
        }

        // Create the programmer entry in the database
        Programmer::create([
            'name' => $request->input('name'),
            'nim' => $request->input('nim'),
            'description' => $request->input('description'),
            'image' => $imagePath, // Save the image path, relative to 'public'
        ]);

        // Redirect back with success
        return redirect()->route('programmers.index')->with('success', 'Programmer added successfully.');
    }

    public function beranda()
    {
        $programmers = Programmer::all();  // Fetch all programmers
        return view ('beranda', compact('programmers'));
    }
}
