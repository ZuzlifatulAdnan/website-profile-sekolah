<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\kategoriBerita;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main

        // Main Side
        $kategoriBerita = kategoriBerita::withCount('berita')->get();
        $beritaTerbaru = Berita::latest()->take(5)->get();
        return view('user.pesan', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // Main
            
            // Main side
            'kategoriBerita' => $kategoriBerita,
            'beritaTerbaru' => $beritaTerbaru
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'pesan' => 'required',
        ]);
        Pesan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan

        ]);

        return redirect(route('pesan'))->with('success', 'Pesan Berhasil Dikirimkan');;
    }
}
