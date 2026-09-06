<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaCaptionAI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fdf2f8, #f3e8ff, #dbeafe);
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #1f2937;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
        }

        input, textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            box-sizing: border-box;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        button {
            margin-top: 20px;
            width: 100%;
            background: linear-gradient(90deg, #ec4899, #8b5cf6);
            color: white;
            border: none;
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .result-box {
            margin-top: 30px;
            padding: 20px;
            border-radius: 12px;
            background: #f8fafc;
            border-left: 5px solid #8b5cf6;
        }

        .result-box h2 {
            margin-top: 0;
            color: #111827;
        }

        .result-box p {
            margin: 8px 0;
            color: #374151;
        }

        .caption-output {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #1f2937;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 16px;
        }

        .hashtag {
            color: #7c3aed;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>InstaCaptionAI</h1>

        <form method="POST" action="{{ route('caption.store') }}">
            @csrf

            <label for="photo_topic">Photo topic</label>
            <input type="text" name="photo_topic" id="photo_topic" value="{{ old('photo_topic', $photo_topic ?? '') }}" placeholder="Example: Sunset beach vacation" required>

            <label for="keywords">Keywords (3–5)</label>
            <textarea name="keywords" id="keywords" placeholder="Example: beach, sunset, travel, relax, memories" required>{{ old('keywords', $keywords ?? '') }}</textarea>

            <button type="submit">Generate Caption</button>
        </form>

        @if(isset($submitted) && $submitted)
            <div class="result-box">
                <h2>Submitted Data</h2>
                <p><strong>Photo Topic:</strong> {{ $photo_topic }}</p>
                <p><strong>Keywords:</strong> {{ $keywords }}</p>

                @if(!empty($error))
                    <p><strong>Error:</strong> {{ $error }}</p>
                @elseif(!empty($caption))
                    <div class="caption-output">
                        {!! preg_replace('/#([A-Za-z0-9_]+)/', '<span class="hashtag">#$1</span>', e($caption)) !!}
                    </div>
                @endif
            </div>
        @endif
    </div>
</body>
</html>
