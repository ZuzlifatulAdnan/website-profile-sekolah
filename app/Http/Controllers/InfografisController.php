<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Infografis;
use App\Models\Jurusan;
use App\Models\Popup;
use Illuminate\Http\Request;

class InfografisController extends Controller
{
    public function index(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil infografis dengan pencarian dan pagination
        $infografis = Infografis::when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%' . $judul . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(9); // Mengatur jumlah item per halaman
        $announcement = Popup::first(); 
        return view(
            'user.infografis',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'infografis' => $infografis,
                'announcement' => $announcement,
                ]
        );
    }
}
