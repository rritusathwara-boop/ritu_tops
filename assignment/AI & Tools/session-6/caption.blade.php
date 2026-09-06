caption.blade.php<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>InstaCaptionAI</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            width: 100%;
            margin-top: 25px;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #e1306c;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #c7255b;
        }

        .result {
            margin-top: 30px;
            padding: 20px;
            background: #f8f8f8;
            border-radius: 8px;
        }

        .result h2 {
            margin-top: 0;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>📸 InstaCaptionAI</h1>

    <form action="{{ route('caption.submit') }}" method="POST">

        @csrf

        <label for="topic">Photo Topic</label>

        <input
            type="text"
            id="topic"
            name="topic"
            placeholder="Example: Sunset at the beach"
            value="{{ old('topic', $topic ?? '') }}"
            required
        >

        <label for="keywords">3-5 Keywords</label>

        <textarea
            id="keywords"
            name="keywords"
            placeholder="Example: sunset, beach, vacation, ocean"
            required
        >{{ old('keywords', $keywords ?? '') }}</textarea>

        <button type="submit">
            Submit
        </button>

    </form>


    @if(isset($topic) && isset($keywords))

        <div class="result">

            <h2>Submitted Data</h2>

            <p>
                <strong>Photo Topic:</strong>
                {{ $topic }}
            </p>

            <p>
                <strong>Keywords:</strong>
                {{ $keywords }}
            </p>

        </div>

    @endif

</div>

</body>
</html>