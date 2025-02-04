<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    public function listAllEvents(): View
    {
        $events = Event::all();
        return view('events', ['events' => $events]);
    }
}