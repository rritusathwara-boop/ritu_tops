<?php
//session-6 Task-2

namespace App\Services;

use OpenAI\Factory;

class OpenAIService
{
    public function generateCaption(string $topic, string $keywords): string
    {
        $prompt = <<<PROMPT
You are a social media copywriter who creates high-performing Instagram captions for trending topics.

Goal: write a polished, engaging caption for a photo/video about: "{$topic}"

Requirements:
- Use a confident, modern, natural social-media voice.
- Include these keywords naturally and smoothly: "{$keywords}"
- Make it feel relevant to current trends, culture, and audience interests.
- Keep it concise but impactful: 2 to 3 sentences maximum.
- Include 1 clear call-to-action that invites comments, saves, or shares.
- Add 3 to 8 relevant hashtags at the end, but keep them tasteful and readable.
- Avoid robotic phrasing, filler, or keyword stuffing.
- Do not mention that you are an AI.
- Output only the final caption text.
PROMPT;

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
            'temperature' => 0.9,
        ]);

        return trim($response->choices[0]->message->content ?? 'No caption generated.');
    }
}
