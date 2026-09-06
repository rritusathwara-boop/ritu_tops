<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptionController extends Controller
{
    public function showForm()
    {
        return view('caption');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'keywords' => 'required|string|max:500',
        ]);

        $topic = $request->input('topic');
        $keywords = $request->input('keywords');

        return view('caption', compact('topic', 'keywords'));
    }
    
}