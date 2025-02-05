<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Salon;
use Illuminate\View\View;

class SalonController extends Controller
{
    public function index(): View
    {
        $salons = Salon::with('owner')->get(); 
        return view('salons.index', compact('salons'));
    }

    public function listAllSalons(): View
    {
        $salons = Salon::all();
        return view('salons', ['salons' => $salons]);
    }

}