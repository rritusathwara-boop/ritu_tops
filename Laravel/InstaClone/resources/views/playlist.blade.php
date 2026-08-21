<!DOCTYPE html>
<html>
<head>
    <title>Playlist</title>
</head>
<body>

    <h1>Playlist</h1>

    <form action="/playlist/add" method="POST">
        @csrf
        <button type="submit">Add Song</button>
    </form>

</body>
</html>