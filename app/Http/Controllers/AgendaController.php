<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Ekskul;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil agenda dengan pencarian dan pagination
        $agenda = Agenda::when($judul, function ($query, $judul) {
            return $query->where('judul', 'like', '%' . $judul . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(8); // Mengatur jumlah item per halaman
        return view(
            'user.agenda',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'agenda' => $agenda]
        );
    }
}
