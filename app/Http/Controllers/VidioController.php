<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\vidio;
use Illuminate\Http\Request;

class VidioController extends Controller
{
    public function index(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil Video dengan pencarian dan pagination
        $videos = vidio::when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%' . $judul . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(8); // Mengatur jumlah item per halaman
        return view(
            'user.video',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'videos' => $videos
            ]
        );
    }
}
