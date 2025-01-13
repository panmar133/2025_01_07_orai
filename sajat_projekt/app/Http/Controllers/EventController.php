<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function selectPosts()
    {
        // Az adatok lekérése az adatbázisból 
        $posts = DB::table('events')->get();

        // Az adatok átadása a nézetnek
        return view('events', ['events' => $posts]);
    }
}