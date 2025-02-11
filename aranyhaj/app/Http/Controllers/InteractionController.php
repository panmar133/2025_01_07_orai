<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interaction;
use Illuminate\Support\Facades\Auth;

class InteractionController extends Controller
{
    public function likeEvent(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $interaction = Interaction::updateOrCreate(
            ['user_id' => Auth::id(), 'event_id' => $request->event_id],
            ['liked' => 1]
        );

        return redirect()->back()->with('success', 'Sikeres művelet!');
    }

    public function participateEvent(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $interaction = Interaction::updateOrCreate(
            ['user_id' => Auth::id(), 'event_id' => $request->event_id],
            ['participation' => 1]
        );

        return redirect()->back()->with('success', 'Sikeres művelet!');
    }
}
