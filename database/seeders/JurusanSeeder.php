<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusans')->insert([
            [
                'nama' => 'Teknik Informatika',
                'deskripsi' => 'Jurusan yang mempelajari tentang komputer, perangkat lunak, dan pemrograman.',
                'created_at' => now(),
            ],
            [
                'nama' => 'Desain Grafis',
                'deskripsi' => 'Jurusan yang fokus pada desain visual, seni grafis, dan media digital.',
                'created_at' => now(),
            ],
            [
                'nama' => 'Akuntansi',
                'deskripsi' => 'Jurusan yang mempelajari tentang pencatatan keuangan, laporan, dan analisis akuntansi.',
                'created_at' => now(),
            ],
            [
                'nama' => 'Biologi',
                'deskripsi' => 'Jurusan yang mempelajari tentang kehidupan, makhluk hidup, dan ekosistem.',
                'created_at' => now(),
            ],
            [
                'nama' => 'Ekonomi',
                'deskripsi' => 'Jurusan yang mempelajari tentang perekonomian, pasar, dan manajemen bisnis.',
                'created_at' => now(),
            ],
        ]);
    }
}
