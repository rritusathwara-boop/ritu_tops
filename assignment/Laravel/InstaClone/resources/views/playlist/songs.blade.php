<!DOCTYPE html>
<html>
<head>
    <title>{{ $playlist->name }} - Songs</title>
</head>
<body>

    <h1>{{ $playlist->name }}</h1>

    <h2>Songs</h2>

    @if($songs->count() > 0)

        <ul>
            @foreach($songs as $song)
                <li>
                    {{ $song->name }}

                    @if($song->artist)
                        - {{ $song->artist }}
                    @endif
                </li>
            @endforeach
        </ul>

    @else

        <p>No songs found in this playlist.</p>

    @endif

</body>
</html>