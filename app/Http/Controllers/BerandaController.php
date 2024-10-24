<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Alumni;
use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Hero;
use App\Models\Infografis;
use App\Models\Jurusan;
use App\Models\Media;
use App\Models\Penghargaan;
use App\Models\Pengumuman;
use App\Models\Popup;
use App\Models\Profile;
use App\Models\Staff;
use App\Models\vidio;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // Main
        $hero = Hero::where('status', 'aktif')->orderBy('display_order', 'asc')->get();
        $visi = Profile::where('section', 'Visi')->first();
        $misi = Profile::where('section', 'Misi')->first();
        $sambutan = Profile::where('section', 'Sambutan')->first();
        $agenda = Agenda::orderBy('created_at', 'asc')->get();
        $pengumumans = Pengumuman::orderBy('created_at', 'desc')->take(5)->get();
        $infografis = Infografis::orderBy('created_at', 'desc')->take(3)->get();
        $videos = vidio::orderBy('created_at', 'desc')->take(5)->get();
        $penghargaan = Penghargaan::orderBy('created_at', 'desc')->take(3)->get();
        $berita = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $staff = Staff::orderBy('created_at', 'desc')->take(3)->get();
        $alumni = Alumni::orderBy('created_at', 'desc')->take(3)->get();
        $announcement = Popup::first(); 

        return view(
            'user.index',
            [
                // Header
                'ekskuls' => $ekskuls,
                'jurusans' => $jurusans,
                // main
                'hero' => $hero,
                'visi' => $visi,
                'sambutan' => $sambutan,
                'agenda' => $agenda,
                'pengumumans' => $pengumumans,
                'infografis' => $infografis,
                'videos' => $videos,
                'berita' => $berita,
                'staff' => $staff,
                'misi' => $misi,
                'penghargaan' => $penghargaan,
                'alumni' => $alumni,
                'announcement' => $announcement,
            ]
        );
    }
}
