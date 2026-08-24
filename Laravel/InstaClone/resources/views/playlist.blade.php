<!DOCTYPE html>
<html>
<head>
    <title>All Playlist</title>
</head>
<body>
	{{--
    @include('partials.navbar')
	
	    <h1>All Playlists</h1>
		--}}

	{{-- session-9 Task-3 --}}
     <h1>Updated Playlist</h1>

    <h2>{{ $playlist->title }}</h2>
    <p>{{ $playlist->description }}</p>
	 
</body>
</html>