<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist AI Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 760px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-bottom: 20px;
            color: #1f2937;
        }

        textarea {
            width: 100%;
            min-height: 140px;
            padding: 14px 16px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            resize: vertical;
        }

        button {
            margin-top: 16px;
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }

        .summary-box {
            margin-top: 30px;
            background: #eef6ff;
            border-left: 5px solid #2563eb;
            padding: 18px 20px;
            border-radius: 8px;
            line-height: 1.6;
            color: #1f2937;
        }

        .error {
            margin-top: 20px;
            background: #fef2f2;
            color: #991b1b;
            border-left: 5px solid #dc2626;
            padding: 12px 16px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Playlist AI Summary</h1>

        <form method="POST" action="{{ route('playlist.ai.summary') }}">
            @csrf

            <label for="prompt"><strong>Describe your playlist</strong></label>
            <textarea name="prompt" id="prompt" placeholder="Example: Summarize this playlist: Best Bollywood hits for a road trip">{{ old('prompt', $prompt ?? 'Summarize this playlist: Best Bollywood hits for a road trip') }}</textarea>

            <button type="submit">Generate Summary</button>
        </form>

        @if(!empty($error))
            <div class="error">
                {{ $error }}
            </div>
        @endif

        @if(!empty($summary))
            <div class="summary-box">
                <strong>AI Summary:</strong><br>
                {{ $summary }}
            </div>
        @endif

        @if($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
</body>
</html>
