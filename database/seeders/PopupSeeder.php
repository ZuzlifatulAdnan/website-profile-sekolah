<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('popups')->insert([
            [
                'judul' => 'Selamat Datang di Sekolah Kami!',
                'image' => '',
                'status' => 'Aktif',
                'created_at' => now(),
            ],
        ]);
    }
}
