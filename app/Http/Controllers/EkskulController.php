<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\kategoriBerita;
use App\Models\Popup;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function show($id)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main
        $eksul = Ekskul::find($id);

        // Check if the news article exists
        if (!$eksul) {
            return abort(404, 'Ekskul tidak ditemukan.');
        }
        // Side Main
        $kategoriBerita = kategoriBerita::withCount('berita')->get();
        $beritaTerbaru = Berita::latest()->take(5)->get();
        $announcement = Popup::first(); 
        return view('user.ekskul', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // Main
            'ekskul'=>$eksul,
            // Side main
            'kategoriBerita' => $kategoriBerita,
            'beritaTerbaru' => $beritaTerbaru,
            'announcement' => $announcement,
        ]);
    }
}
