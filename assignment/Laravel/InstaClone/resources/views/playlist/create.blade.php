<!DOCTYPE html>
<html>
<head>
    <title>Create Playlist</title>
</head>
<body>
    //session-11 Task-5
    @if($errors->has('description'))
        <p style="color: red;">
            {{ $errors->first('description') }}
        </p>
    @endif

<label>Description:</label>
<br>

<textarea name="description">{{ old('description') }}</textarea>
        {{--
    <h1>Create New Playlist</h1>

    {{--session-5 Task-4,2--}}
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
    --}}
{{--
    //session-10 Task-1,2
    <h1>Create New Playlist</h1>
--}}
@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--
@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<form action="/playlists" method="POST" enctype="multipart/form-data">

    @csrf

    <label>Playlist Name:</label>
    <br>
    <input type="text" name="name" value="{{ old('name') }}">

    <br><br>

    <label>Description:</label>
    <br>
    <textarea name="description">{{ old('description') }}</textarea>

    <br><br>

    <label>Cover Image:</label>
    <br>
    <input type="file" name="cover_image" accept="image/*">

    <br><br>

    <button type="submit">Create Playlist</button>
--}}
</body>
</html>