<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function index()
    {
        // Mengambil pengumuman pertama dari database
        $announcement = Pengumuman::first(); 
        
        // Mengirim data ke view
        return view(
            'layouts.app',
            [
                // Header
                'announcement' => $announcement,
            ]);
    }
}
