<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\kategoriBerita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main
        $keyword = $request->input('judul'); // Search by news title
        $kategoriId = $request->input('kategori_berita_id'); // Filter by category

        // Fetch news (berita) based on the category and search keyword
        $berita = Berita::when($kategoriId, function ($query) use ($kategoriId) {
            $query->where('kategori_berita_id', $kategoriId);
        })
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('judul', 'like', '%' . $keyword . '%')
                        ->orWhere('deskripsi', 'like', '%' . $keyword . '%');
                });
            })
            ->latest()
            ->paginate(9); // You can change the pagination number as needed

        // Append the search term and category for pagination links
        $berita->appends(['judul' => $keyword, 'kategori_berita_id' => $kategoriId]);

        // Fetch all categories
        $kategoriBerita = kategoriBerita::all();

        // Fetch the latest news
        $beritaTerbaru = Berita::latest()->take(3)->get();

        return view('user.berita', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            //  main
            'berita' => $berita,
            'kategoriBerita' => $kategoriBerita,
            'beritaTerbaru' => $beritaTerbaru
        ]);
    }
    public function show($id)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main
        $berita = Berita::find($id);

        // Check if the news article exists
        if (!$berita) {
            return abort(404, 'Berita tidak ditemukan.');
        }
        return view('user.berita-show', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // Main
            'berita' => $berita

        ]);
    }
}
