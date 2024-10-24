<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\kategoriBerita;
use App\Models\Popup;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function visi()
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main
        $visi = Profile::where('section', 'Visi')->first();
        $misi = Profile::where('section', 'Misi')->first();
        $kategoriBerita = kategoriBerita::withCount('berita')->get();
        $beritaTerbaru = Berita::latest()->take(5)->get();
        $announcement = Popup::first(); 
        return view('user.visi', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // Main
            'visi' => $visi,
            'misi' => $misi,
            'kategoriBerita' => $kategoriBerita,
            'beritaTerbaru' => $beritaTerbaru,
            'announcement' => $announcement,
        ]);
    }
    public function sambutan()
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // main
        $sambutan = Profile::where('section', 'Sambutan')->first();
        $kategoriBerita = kategoriBerita::withCount('berita')->get();
        $beritaTerbaru = Berita::latest()->take(5)->get();
        $announcement = Popup::first(); 

        return view('user.sambutan', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // main
            'kategoriBerita' => $kategoriBerita,
            'beritaTerbaru' => $beritaTerbaru,
            'sambutan' => $sambutan,
            'announcement' => $announcement,
        ]);
    }
}
