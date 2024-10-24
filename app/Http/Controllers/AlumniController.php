<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Ekskul;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil alumni dengan pencarian dan pagination
        $alumni = Alumni::when($judul, function ($query, $judul) {
            return $query->where('nama', 'like', '%' . $judul . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(9); // Mengatur jumlah item per halaman
        return view(
            'user.alumni',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'alumni' => $alumni]
        );
    }
}
