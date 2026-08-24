<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $path = public_path('storage/profile_pics');

        $images = File::exists($path)
            ? File::files($path)
            : [];

        return view('gallery', compact('images'));
    }
}