<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beritas')->insert([
            [
                'judul' => 'Pembukaan Tahun Ajaran Baru',
                'deskripsi' => 'Tahun ajaran baru akan segera dimulai dengan berbagai kegiatan pembelajaran dan acara.',
                // 'tanggal_upload' => '2024-08-01',
                'users_id' => 1,
                'image' => '',
                'kategori_berita_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Pengumuman Libur Nasional',
                'deskripsi' => 'Libur nasional dalam rangka Hari Kemerdekaan akan berlangsung pada tanggal 17 Agustus.',
                // 'tanggal_upload' => '2024-08-10',
                'users_id' => 1,
                'image' => '',
                'kategori_berita_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Acara Peringatan Hari Guru',
                'deskripsi' => 'Sekolah akan mengadakan acara khusus untuk memperingati Hari Guru pada bulan November.',
                // 'tanggal_upload' => '2024-08-20',
                'users_id' => 1,
                'image' => '',
                'kategori_berita_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
