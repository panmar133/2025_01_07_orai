<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Salon;
use App\Models\Event;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        $salons = Salon::all();
        $events = Event::all();
        return view('admin.dashboard', compact('users', 'salons', 'events')); 
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Felhasználó törölve!');
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->admin = 2;
        $user->save();
        return redirect()->route('admin.dashboard')->with('success', 'Felhasználó admin lett!');
    }
    public function removeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->admin = 0;
        $user->save();

        return redirect()->back()->with('success', 'Felhasználó admin joga visszavonva.');
    }
    
    public function createSalon(Request $request)
    {
        $request->validate([
            'salon_name' => 'required|string|max:20',
            'image_name' => 'nullable|string|max:500',
            'short_information' => 'required|string|max:100',
            'information' => 'required|string',
            'location' => 'required|string|max:150',
            'owner_id' => 'required|exists:users,id',
        ]);
        

        $salon = new Salon();
        $salon->salon_name = $request->salon_name;
        $salon->short_information = $request->short_information;
        $salon->information = $request->information;
        $salon->location = $request->location;
        $salon->owner_id = $request->owner_id;

        if (!empty($request->image_name)) {
            $salon->image_name = $request->image_name;
        }
        $salon->save();

        $owner = User::find($request->owner_id);
        $owner->admin = 1;
        $owner->save();

        return redirect()->route('admin.dashboard')->with('success', 'Szalon sikeresen létrehozva!');
    }

    public function updateSalon(Request $request, $salonId)
    {
    $salon = Salon::findOrFail($salonId);

    $salon->salon_name = $request->salon_name;
    $salon->location = $request->location;

    $salon->save();

    return redirect()->route('admin.dashboard')->with('success', 'Szalon sikeresen módosítva!');
    }

public function deleteSalon($salonId)
    {
    $salon = Salon::findOrFail($salonId);
    $salon->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Szalon sikeresen törölve!');
    }   

    public function createEvent(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:20',
        'location' => 'required|string|max:150',
        'short_information' => 'required|string|max:100',
        'information' => 'required|string',
        'image_name' => 'nullable|string|max:500',
        'starts_at' => 'required|date',
    ]);

    $data = [
        'title' => $request->title,
        'location' => $request->location,
        'short_information' => $request->short_information,
        'information' => $request->information,
        'starts_at' => $request->starts_at,
        'owner_id' => auth()->id(),
        'salon_id' => 1,
    ];
    
    if (!empty($request->image_name)) {
        $data['image_name'] = $request->image_name;
    }
    
    Event::create($data);    

    return redirect()->route('admin.dashboard')->with('success', 'Esemény sikeresen létrehozva!');
}

    public function editEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Esemény sikeresen módosítva!');
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Esemény törölve!');
    }
}