<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class SalonController extends Controller
{
    public function selectSalons()
    {
        // Az adatok lekérése az adatbázisból 
        $salons = DB::table('salons')->get();

        // Az adatok átadása a nézetnek
        return view('salons', ['salons' => $salons]);
    }
}