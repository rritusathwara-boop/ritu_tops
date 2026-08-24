<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture Gallery</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            max-width: 1100px;
            margin: auto;
        }

        .gallery img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .empty {
            text-align: center;
            font-size: 18px;
            color: #777;
        }
    </style>
</head>

<body>

    <h1>Profile Picture Gallery</h1>

    @if(count($images) > 0)

        <div class="gallery">

            @foreach($images as $image)

                <img
                    src="{{ asset('storage/profile_pics/' . $image->getFilename()) }}"
                    alt="Profile Picture"
                >

            @endforeach

        </div>

    @else

        <p class="empty">No profile pictures found.</p>

    @endif

</body>
</html>