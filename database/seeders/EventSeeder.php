<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'judul' => 'Festival Seni',
                'deskripsi' => 'Festival seni tahunan yang menampilkan berbagai pertunjukan seni dari siswa.',
                'tanggal_mulai' => '2024-09-01',
                'tanggal_selesai' => '2024-09-03',
                'lokasi' => 'Gedung Serbaguna Sekolah',
                'users_id' => 1, // Pengguna 1
                'created_at' => now(),
            ],
            [
                'judul' => 'Turnamen Olahraga',
                'deskripsi' => 'Turnamen olahraga antar kelas dengan berbagai cabang olahraga.',
                'tanggal_mulai' => '2024-10-10',
                'tanggal_selesai' => '2024-10-12',
                'lokasi' => 'Lapangan Olahraga Sekolah',
                'users_id' => 1, // Pengguna 2
                'created_at' => now(),
            ],
            [
                'judul' => 'Pameran Teknologi',
                'deskripsi' => 'Pameran teknologi yang menampilkan proyek-proyek dari klub robotika dan komputer.',
                'tanggal_mulai' => '2024-11-05',
                'tanggal_selesai' => '2024-11-07',
                'lokasi' => 'Ruang Pameran Teknologi',
                'users_id' => 1, // Pengguna 1
                'created_at' => now(),
            ],
            [
                'judul' => 'Workshop Kewirausahaan',
                'deskripsi' => 'Workshop tentang pengembangan ide bisnis dan strategi kewirausahaan.',
                'tanggal_mulai' => '2024-12-01',
                'tanggal_selesai' => '2024-12-01',
                'lokasi' => 'Ruang Workshop Sekolah',
                'users_id' => 1, // Pengguna 2
                'created_at' => now(),
            ],
        ]);
    }
}
