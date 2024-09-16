<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('heroes')->insert([
            [
                'nama' => 'Superman',
                'alt_text' => 'Pahlawan super dari planet Krypton dengan kekuatan luar biasa.',
                'display_order' => 1,
                'status' => 'Aktif',
                'created_at' => now(),
            ],
            [
                'nama' => 'Batman',
                'alt_text' => 'Pahlawan kota Gotham yang menggunakan kecerdasan dan teknologi.',
                'display_order' => 2,
                'status' => 'Aktif',
                'created_at' => now(),
            ],
            [
                'nama' => 'Wonder Woman',
                'alt_text' => 'Pahlawan Amazons dengan kekuatan fisik dan keterampilan bertempur.',
                'display_order' => 3,
                'status' => 'Tidak',
                'created_at' => now(),
            ],
            [
                'nama' => 'Aquaman',
                'alt_text' => 'Raja Atlantis dengan kemampuan berkomunikasi dengan makhluk laut.',
                'display_order' => 4,
                'status' => 'Aktif',
                'created_at' => now(),
            ],
            [
                'nama' => 'Flash',
                'alt_text' => 'Pahlawan dengan kecepatan super dan kemampuan perjalanan waktu.',
                'display_order' => 5,
                'status' => 'Tidak',
                'created_at' => now(),
            ],
        ]);
    }
}
