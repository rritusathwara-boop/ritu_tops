<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
</head>
<body>

<h1>Create Event</h1>
{{--
@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/events" method="POST">

    @csrf

    <label>Event Name:</label>
    <br>
    <input type="text" name="event_name" value="{{ old('event_name') }}">

    <br><br>

    <label>Date:</label>
    <br>
    <input type="date" name="date" value="{{ old('date') }}">

    <br><br>

    label>Location:</label>
    <br>
    <input type="text" name="location" value="{{ old('location') }}">

--}}
{{--}}
session-11 Task-3
    <form action="/events" method="POST">
    @csrf

    {{-- Event Name --}}
    @if($errors->has('event_name'))
        <p style="color: red;">
            {{ $errors->first('event_name') }}
        </p>
    @endif

    <label>Event Name:</label>
    <br>
    <input
        type="text"
        name="event_name"
        value="{{ old('event_name') }}"
    >

    <br><br>


    {{-- Date --}}
    @if($errors->has('date'))
        <p style="color: red;">
            {{ $errors->first('date') }}
        </p>
    @endif

    <label>Date:</label>
    <br>
    <input
        type="date"
        name="date"
        value="{{ old('date') }}"
    >

    <br><br>


    {{-- Location --}}
    @if($errors->has('location'))
        <p style="color: red;">
            {{ $errors->first('location') }}
        </p>
    @endif

    <label>Location:</label>
    <br>
    <input
        type="text"
        name="location"
        value="{{ old('location') }}"
    >

    <br><br>
 <button type="submit">Create Event</button>
 --}}

 @if($errors->has('description'))
    <p style="color: red;">
        {{ $errors->first('description') }}
    </p>
@endif

<label>Description:</label>
<br>

<textarea name="description">{{ old('description') }}</textarea>

</form>

</body>
</html>