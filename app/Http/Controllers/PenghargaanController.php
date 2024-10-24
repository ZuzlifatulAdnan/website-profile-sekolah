<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\Penghargaan;
use Illuminate\Http\Request;

class PenghargaanController extends Controller
{
    public function index(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil Prestasi dengan pencarian dan pagination
        $prestasi = Penghargaan::when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%' . $judul . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(9); // Mengatur jumlah item per halaman
        return view(
            'user.prestasi',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'prestasi' => $prestasi]
        );
    }
}
