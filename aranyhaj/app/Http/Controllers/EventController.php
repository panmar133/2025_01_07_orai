<?php
namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function listAllEvents()
    {
        $events = Event::all();
        return view('events', compact('events'));
    }
}
