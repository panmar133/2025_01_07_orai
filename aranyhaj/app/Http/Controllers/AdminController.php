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
}