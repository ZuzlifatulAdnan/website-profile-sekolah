<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PpdbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ppdbs')->insert([
            [
                'judul' => 'Alur Pendaftaran PPDB',
                'deskripsi' => 'Panduan lengkap tentang alur pendaftaran siswa baru di tahun ajaran ini.',
                // 'tanggal_upload' => '2024-08-25',
                'kategori' => 'Alur',
                'image' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'judul' => 'Brosur PPDB 2024',
                'deskripsi' => 'Brosur lengkap mengenai program dan fasilitas yang tersedia di sekolah.',
                // 'tanggal_upload' => '2024-08-26',
                'kategori' => 'Brosur',
                'image' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'judul' => 'Kuota Siswa Baru',
                'deskripsi' => 'Informasi mengenai kuota penerimaan siswa baru untuk tahun ajaran 2024.',
                // 'tanggal_upload' => '2024-08-27',
                'kategori' => 'Kuota',
                'image' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'judul' => 'Alur Pendaftaran Online',
                'deskripsi' => 'Langkah-langkah pendaftaran siswa baru secara online.',
                // 'tanggal_upload' => '2024-08-28',
                'kategori' => 'Alur',
                'image' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'judul' => 'Brosur Program Beasiswa',
                'deskripsi' => 'Informasi mengenai program beasiswa yang tersedia untuk siswa baru.',
                // 'tanggal_upload' => '2024-08-29',
                'kategori' => 'Brosur',
                'image' => '',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
        ]);
    }
}
