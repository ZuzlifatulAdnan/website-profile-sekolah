<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function download(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil Download dengan pencarian dan pagination
        $download = Media::when($judul, function ($query, $judul) {
            return $query->where('nama', 'like', '%' . $judul . '%');
        })
            ->where('kategori', 'Dokumen')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Mengatur jumlah item per halaman
        return view(
            'user.download',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'download' => $download
            ]
        );
    }
    public function foto(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Mengambil query pencarian dari input
        $judul = $request->input('judul');

        // Mengambil Foto dengan pencarian dan pagination
        $foto = Media::when($judul, function ($query, $judul) {
            return $query->where('nama', 'like', '%' . $judul . '%');
        })
            ->where('kategori', 'Foto')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Mengatur jumlah item per halaman
        return view(
            'user.foto',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // Main
                'foto' => $foto
            ]
        );
    }
}
