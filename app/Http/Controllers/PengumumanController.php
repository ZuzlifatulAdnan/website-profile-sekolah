<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil pengumuman dengan pencarian dan pagination
        $pengumuman = Pengumuman::when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%' . $judul . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(8); // Mengatur jumlah item per halaman
        return view(
            'user.pengumuman',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'pengumuman' => $pengumuman]
        );
    }
}
