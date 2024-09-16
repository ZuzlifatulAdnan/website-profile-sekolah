<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfografisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('infografis')->insert([
            [
                'judul' => 'Statistik Pendidikan 2024',
                'image' => 'statistik_pendidikan_2024.jpg',
                'created_at' => now(),
            ],
            [
                'judul' => 'Tren Teknologi Terbaru',
                'image' => 'tren_teknologi_terbaru.jpg',
                'created_at' => now(),
            ],
            [
                'judul' => 'Panduan Belajar Efektif',
                'image' => 'panduan_belajar_efektif.jpg',
                'created_at' => now(),
            ],
            [
                'judul' => 'Kesehatan Mental Siswa',
                'image' => 'kesehatan_mental_siswa.jpg',
                'created_at' => now(),
            ],
            [
                'judul' => 'Perkembangan Olahraga Sekolah',
                'image' => 'perkembangan_olahraga_sekolah.jpg',
                'created_at' => now(),
            ],
        ]);
    }
}
