<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media')->insert([
            [
                'nama' => 'Foto Kegiatan Sekolah',
                'kategori' => 'Foto',
                'file' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'nama' => 'Video Pengantar Belajar',
                'kategori' => 'Vidio',
                'file' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'nama' => 'Dokumen Kurikulum',
                'kategori' => 'Dokumen',
                'file' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'nama' => 'Foto Acara Perpisahan',
                'kategori' => 'Foto',
                'file' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'nama' => 'Video Workshop Kewirausahaan',
                'kategori' => 'Vidio',
                'file' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
        ]);
    }
}
