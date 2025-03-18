<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salon;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index()
    {
        $salons = Salon::where('owner_id', Auth::id())->get();

        return view('owner.dashboard', ['salons' => $salons]);
    }
}