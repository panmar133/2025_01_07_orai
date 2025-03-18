<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Események listázása
    public function listAllEvents()
    {
        $events = Event::all(); // Minden esemény lekérése
        return view('events.index', compact('events')); // events.index nézet visszaadása
    }

    // Események és azok interakcióinak (likes, participants) lekérése
    public function showEventsDatas()
    {
        $events = Event::withCount([
            'likes as likes_count',
            'participants as participants_count'
        ])->get();

        return view('events', compact('events'));
    }

    // Egy adott esemény részletes adatainak megjelenítése
    public function show($id)
    {
        $event = Event::withCount([
            'likes as likes_count',
            'participants as participants_count'
        ])->findOrFail($id);

        return view('events.program', compact('event'));
    }

    // Új esemény létrehozása (form megjelenítése)
    public function create()
    {
        return view('events.create');
    }

    // Új esemény mentése
    public function store(Request $request)
    {
        // Validáljuk az adatokat
        $request->validate([
            'title' => 'required|string|max:50',
            'location' => 'nullable|string|max:150',
            'short_information' => 'nullable|string',
            'information' => 'nullable|string',
            'starts_at' => 'required|date',
            'salon_id' => 'required|exists:salons,id',  // Feltételezzük, hogy a szalonok a 'salons' táblában vannak
        ]);

        // Az új esemény mentése
        $event = new Event();
        $event->owner_id = auth()->id();  // Az esemény tulajdonosának beállítása (a bejelentkezett felhasználó)
        $event->title = $request->title;
        $event->location = $request->location;
        $event->short_information = $request->short_information;
        $event->information = $request->information;
        $event->starts_at = $request->starts_at;
        $event->salon_id = $request->salon_id;  // Szalon hozzárendelése
        $event->save();

        // Átirányítás a sikeres mentés után
        return redirect()->route('owner.dashboard')->with('success', 'Esemény sikeresen létrehozva!');
    }
    public function update(Request $request, $id)
    {
        // Validáljuk az adatokat
        $request->validate([
            'title' => 'required|string|max:50',
            'location' => 'nullable|string|max:150',
            'short_information' => 'nullable|string',
            'information' => 'nullable|string',
            'starts_at' => 'required|date',
        ]);

        // Esemény módosítása
        $event = Event::findOrFail($id);
        $event->update($request->all()); // Az új adatokat frissítjük

        return redirect()->route('owner.dashboard')->with('success', 'Esemény sikeresen frissítve!');
    }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('owner.dashboard')->with('success', 'Esemény sikeresen törölve!');
    }
}