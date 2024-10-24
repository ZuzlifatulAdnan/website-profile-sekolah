<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\kategoriBerita;
use App\Models\Popup;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function show($id)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main
        $jurusan = Jurusan::find($id);

        // Check if the news article exists
        if (!$jurusan) {
            return abort(404, 'Jurusan tidak ditemukan.');
        }
        // Side Main
        $kategoriBerita = kategoriBerita::withCount('berita')->get();
        $beritaTerbaru = Berita::latest()->take(5)->get();
        $announcement = Popup::first(); 
        return view('user.jurusan', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // Main
            'jurusan'=>$jurusan,
            // Side main
            'kategoriBerita' => $kategoriBerita,
            'beritaTerbaru' => $beritaTerbaru,
            'announcement' => $announcement,
        ]);
    }
}
