<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Hero;
use App\Models\Infografis;
use App\Models\Media;
use App\Models\Pengumuman;
use App\Models\Profile;
use App\Models\Staff;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $hero = Hero::where('status', 'aktif')->orderBy('display_order', 'asc')->get();
        $visi = Profile::where('section', 'Visi')->first();
        $misi = Profile::where('section', 'Misi')->first();
        $sambutan = Profile::where('section', 'Sambutan')->first();
        $agenda = Agenda::orderBy('created_at', 'asc')->get();
        $pengumumans = Pengumuman::orderBy('created_at', 'desc')->take(5)->get();
        $infografis = Infografis::orderBy('created_at', 'asc')->get();
        $video = Media::where('kategori', 'video')->orderBy('kategori')->get();
        $berita = Berita::orderBy('created_at', 'asc')->get();
        $staff = Staff::where('posisi', 'Kepala Sekolah')->orderBy('posisi')->get();

        return view('user.index', 
        ['hero' => $hero, 'visi' => $visi, 'sambutan'=>$sambutan, 'agenda'=>$agenda, 'pengumumans'=>$pengumumans,
    'infografis'=>$infografis, 'video'=>$video, 'berita'=>$berita, 'staff'=>$staff, 'misi'=>$misi]);
    }
}
