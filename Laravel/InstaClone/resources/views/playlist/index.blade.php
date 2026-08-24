<!DOCTYPE html>
<html>
<head>
    <title>Playlists</title>
</head>
<body>

<h1>All Playlists</h1>

@foreach($playlist as $playlist)

    <h2>{{ $playlist->name }}</h2>

    @foreach($playlist->songs as $song)
        <p>{{ $song->title }}</p>
    @endforeach

@endforeach

</body>
</html>