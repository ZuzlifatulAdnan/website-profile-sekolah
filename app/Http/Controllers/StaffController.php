<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function staff(Request $request)
    {
        // Header
        $ekskuls = Ekskul::all();
        $jurusans = Jurusan::all();
        // main
        $keyword = $request->input('nama');
        $staff = Staff::when($request->nama, function ($query, $nama) {
            $query->where('nama', 'like', '%' . $nama . '%');
        })->latest()->paginate(9);
        // masukn key name kedalam array users
        $staff->appends(['nama' => $keyword]);

        return view('user.staff', [
            // Header
            'ekskuls' => $ekskuls,
            'jurusans' => $jurusans,
            // main
            'staff' => $staff
        ]);
    }
}
