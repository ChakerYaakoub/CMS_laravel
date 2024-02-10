<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the uploaded image
        $request->validate([
            'image' => 'required|image|max:2048', // Max file size: 2MB
        ]);

        // Store the uploaded image in the 'public/images' directory
        $path = $request->file('image')->store('images', 'public');

        // Generate the URL for the uploaded image
        $url = Storage::url($path);

        return response()->json([
            'success' => true,
            'url' => $url,
        ]);
    }
}
