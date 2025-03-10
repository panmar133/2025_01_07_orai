<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Interaction;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listAllEvents()
    {
        $events = Event::all();
        return view('events', compact('events'));
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

}

