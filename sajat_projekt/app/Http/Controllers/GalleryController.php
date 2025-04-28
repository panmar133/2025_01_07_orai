<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private $images = [
        'image1.jpg',
        'image2.jpg',
        'image3.jpg',
    ];

    public function index()
    {
        return view('gallery', ['images' => $this->images]);
    }

    public function navigate(Request $request)
    {
        $direction = $request->input('direction');

        // Példa navigáció logikára, későbbi bővítéssel
        if ($direction === 'prev') {
            // Előző kép logikája
        } elseif ($direction === 'next') {
            // Következő kép logikája
        }

        return redirect()->route('gallery.index');
    }
}
