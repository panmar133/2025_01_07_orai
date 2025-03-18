<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listAllEvents()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function showEventsDatas()
    {
        $events = Event::withCount([
            'likes as likes_count',
            'participants as participants_count'
        ])->get();

        return view('events', compact('events'));
    }

    public function show($id)
    {
        $event = Event::withCount([
            'likes as likes_count',
            'participants as participants_count'
        ])->findOrFail($id);

        return view('events.program', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'location' => 'nullable|string|max:150',
            'short_information' => 'nullable|string',
            'information' => 'nullable|string',
            'starts_at' => 'required|date',
            'salon_id' => 'required|exists:salons,id',
        ]);

        $event = new Event();
        $event->owner_id = auth()->id();
        $event->title = $request->title;
        $event->location = $request->location;
        $event->short_information = $request->short_information;
        $event->information = $request->information;
        $event->starts_at = $request->starts_at;
        $event->salon_id = $request->salon_id;
        $event->save();

        return redirect()->route('owner.dashboard')->with('success', 'Esemény sikeresen létrehozva!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'location' => 'nullable|string|max:150',
            'short_information' => 'nullable|string',
            'information' => 'nullable|string',
            'starts_at' => 'required|date',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('owner.dashboard')->with('success', 'Esemény sikeresen frissítve!');
    }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('owner.dashboard')->with('success', 'Esemény sikeresen törölve!');
    }
}