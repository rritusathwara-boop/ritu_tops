<!DOCTYPE html>
<html>
<head>
    <title>Upload Profile Picture</title>
</head>
<body>
            //session-12 Task-1
    <h2>Upload Profile Picture</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/profile/upload" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="profile_picture">Choose Profile Picture:</label>

        <input
            type="file"
            name="profile_picture"
            id="profile_picture"
        >
        <br><br>
        <button type="submit">Upload</button>
    </form>

</body>
</html>