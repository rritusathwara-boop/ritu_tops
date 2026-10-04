<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;

class EventController extends Controller
{
    //session-10 Task-3 
    public function create()
    {
        return view('events.create');
    }

    public function store(CreateEventRequest $request)
    {
        $data = $request->validated();

        return "Event created successfully!";
    }
}