<!DOCTYPE html>
<html>
    <head>
        <title>Top Songs</title>
    </head>
    <body>
        //session-3 Task-3
        <h1>Trending Songs</h1>

        <ul>
            @foreach ($songs as $song)
                <li>{{ $song }}</li>
            @endforeach
        </ul>

        //session-3 Task-4
        <h1>Hello, {{ $userName }}!</h1>

        <h2>Trending Songs</h2>

            <ul>
                @foreach ($songs as $song)
                    <li>{{ $song }}</li>
                @endforeach
            </ul>

    </body>
</html>