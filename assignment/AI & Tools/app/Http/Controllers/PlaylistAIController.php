<?php
//session-5 Task-3,4,5
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use OpenAI\Factory;

class PlaylistAIController extends Controller
{
    public function generatePlaylistDescription(Request $request)
    {
        $request->validate([
            'prompt' => ['required', 'string', 'min:3', 'max:1000'],
        ]);

        $prompt = trim($request->input('prompt'));

        try {
            $client = (new Factory())
                ->withApiKey(env('OPENAI_API_KEY'))
                ->make();

            $response = $client->chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'temperature' => 0.7,
            ]);

            $summary = $response->choices[0]->message->content ?? null;

            if (empty($summary)) {
                throw new \RuntimeException('OpenAI returned an empty response.');
            }

            return view('ai_summary', [
                'prompt' => $prompt,
                'summary' => trim($summary),
                'error' => null,
            ]);
        } catch (\Throwable $e) {
            Log::error('OpenAI playlist summary failed: '.$e->getMessage(), [
                'prompt' => $prompt,
                'trace' => $e->getTraceAsString(),
            ]);

            $friendlyMessage = 'We could not generate the playlist summary right now. Please check your OpenAI API key and try again.';

            if (app()->environment('local')) {
                $friendlyMessage .= ' Details: '.$e->getMessage();
            }

            return view('ai_summary', [
                'prompt' => $prompt,
                'summary' => null,
                'error' => $friendlyMessage,
            ]);
        }
    }
}
