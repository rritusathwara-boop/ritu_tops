<?php

namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\Request;

class CaptionController extends Controller
{

    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function showForm()
    {
        return view('caption-form');
    }

    public function generateCaption(Request $request)
    {
        $request->validate([
            'photo_topic' => ['required', 'string', 'max:255'],
            'keywords' => ['required', 'string'],
        ]);

        $topic = $request->input('photo_topic');
        $keywords = $request->input('keywords');

        try {
            $caption = $this->openAIService->generateCaption($topic, $keywords);

            return view('caption', [
                'photo_topic' => $topic,
                'keywords' => $keywords,
                'caption' => $caption,
                'error' => null,
            ]);
        } catch (\Throwable $e) {
            return view('caption', [
                'photo_topic' => $topic,
                'keywords' => $keywords,
                'caption' => null,
                'error' => 'We could not generate a caption right now. Please check your OpenAI API key and try again.',
            ]);
        }

    }
}