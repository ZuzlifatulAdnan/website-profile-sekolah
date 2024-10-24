<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\kategoriBerita;
use App\Models\Popup;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function alur(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil Alur dengan pencarian dan pagination
        $alur = Ppdb::when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%' . $judul . '%');
        })
            ->where('kategori', 'Alur')
            ->orderBy('created_at', 'desc')
            ->paginate(9); // Mengatur jumlah item per halaman
            $announcement = Popup::first(); 
        return view(
            'user.alur',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'alur' => $alur,
                'announcement' => $announcement,
            ]
        );
    }
    public function alurShow($id)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main
        $alur = Ppdb::find($id);
        $kategoriBerita = kategoriBerita::withCount('berita')->get();
        $beritaTerbaru = Berita::latest()->take(5)->get();
        $announcement = Popup::first(); 
        // Check if the news article exists
        if (!$alur) {
            return abort(404, 'alur tidak ditemukan.');
        }
        return view('user.alur-show', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // Main
            'alur' => $alur,
            'kategoriBerita' => $kategoriBerita,
            'beritaTerbaru' => $beritaTerbaru,
            'announcement' => $announcement,
        ]);
    }
    public function brosur(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil brosur dengan pencarian dan pagination
        $brosur = Ppdb::when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%' . $judul . '%');
        })
            ->where('kategori', 'Brosur')
            ->orderBy('created_at', 'desc')
            ->paginate(9); // Mengatur jumlah item per halaman
            $announcement = Popup::first(); 
        return view(
            'user.brosur',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'brosur' => $brosur,
                'announcement' => $announcement,
            ]
        );
    }
    public function brosurShow($id)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main
        $brosur = Ppdb::find($id);
        $kategoriBerita = kategoriBerita::withCount('berita')->get();
        $beritaTerbaru = Berita::latest()->take(5)->get();
        $announcement = Popup::first(); 
        // Check if the news article exists
        if (!$brosur) {
            return abort(404, 'brosur tidak ditemukan.');
        }
        return view('user.brosur-show', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // Main
            'brosur' => $brosur,
            'kategoriBerita' => $kategoriBerita,
            'beritaTerbaru' => $beritaTerbaru,
            'announcement' => $announcement,

        ]);
    }
    public function kuota(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil kuota dengan pencarian dan pagination
        $kuota = Ppdb::when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%' . $judul . '%');
        })
            ->where('kategori', 'Kuota')
            ->orderBy('created_at', 'desc')
            ->paginate(9); // Mengatur jumlah item per halaman
            $announcement = Popup::first(); 
        return view(
            'user.kuota',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'kuota' => $kuota,
                'announcement' => $announcement,
            ]
        );
    }
    public function kuotaShow($id)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main
        $kuota = Ppdb::find($id);
        $kategoriBerita = kategoriBerita::withCount('berita')->get();
        $beritaTerbaru = Berita::latest()->take(5)->get();
        $announcement = Popup::first(); 
        // Check if the news article exists
        if (!$kuota) {
            return abort(404, 'kuota tidak ditemukan.');
        }
        return view('user.kuota-show', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // Main
            'kuota' => $kuota,
            'kategoriBerita' => $kategoriBerita,
            'beritaTerbaru' => $beritaTerbaru,
            'announcement' => $announcement,
        ]);
    }
}
