<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('event'));
    }
    public function create()
    {
        return view('event.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

}
