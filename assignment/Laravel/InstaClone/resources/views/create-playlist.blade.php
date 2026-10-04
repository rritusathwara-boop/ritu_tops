<!DOCTYPE html>
<html>
<head>
    <title>Create Playlist</title>
</head>
<body>

@if (session('success'))
    <div style="background-color: lightgreen; padding: 10px;">
        {{ session('success') }}
    </div>
@endif

<h1>Create New Playlist</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/playlist">
    @csrf

    <label>Playlist Name:</label>
    <input type="text" name="name" value="{{ old('name') }}">

    <br><br>

    <label>Description:</label>
    <textarea name="description"></textarea>

    <br><br>

    <button type="submit">Create Playlist</button>
</form>

</body>
</html>