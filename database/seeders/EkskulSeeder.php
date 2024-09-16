<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ekskuls')->insert([
            [
                'judul' => 'Drama',
                'deskripsi' => 'Ekstrakurikuler drama berfokus pada pengembangan keterampilan akting dan pementasan.',
                'image' => '',
                'created_at' => now(),
            ],
            [
                'judul' => 'Robotika',
                'deskripsi' => 'Program robotika untuk mengajarkan dasar-dasar pemrograman dan rekayasa.',
                'image' => '',
                'created_at' => now(),
            ],
            [
                'judul' => 'Musik',
                'deskripsi' => 'Ekstrakurikuler musik meliputi latihan alat musik dan vokal.',
                'image' => '',
                'created_at' => now(),
            ],
            [
                'judul' => 'Kewirausahaan',
                'deskripsi' => 'Program kewirausahaan untuk mengembangkan ide bisnis dan keterampilan manajerial.',
                'image' => '',
                'created_at' => now(),
            ],
        ]);
    }
}
