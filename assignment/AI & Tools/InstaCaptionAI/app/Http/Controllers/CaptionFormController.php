<?php
//session-6 Task-2
namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\Request;

class CaptionFormController extends Controller
{
    public function __construct(protected OpenAIService $openAIService)
    {
    }

    public function index()
    {
        return view('caption-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo_topic' => ['required', 'string', 'max:255'],
            'keywords' => ['required', 'string'],
        ]);

        $topic = $validated['photo_topic'];
        $keywords = $validated['keywords'];

        try {
            $caption = $this->openAIService->generateCaption($topic, $keywords);

            return view('caption-form', [
                'photo_topic' => $topic,
                'keywords' => $keywords,
                'caption' => $caption,
                'submitted' => true,
            ]);
        } catch (\Throwable $e) {
            return view('caption-form', [
                'photo_topic' => $topic,
                'keywords' => $keywords,
                'caption' => null,
                'error' => 'We could not generate a caption right now. Please check your OpenAI API key and try again.',
                'submitted' => true,
            ]);
        }
    }
}
