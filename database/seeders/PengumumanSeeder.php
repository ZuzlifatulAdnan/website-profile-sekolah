<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengumumen')->insert([
            [
                'judul' => 'Libur Nasional',
                'deskripsi' => 'Sekolah akan libur pada tanggal 17 Agustus 2024 untuk memperingati Hari Kemerdekaan.',
                // 'tanggal_upload' => '2024-08-25',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'judul' => 'Ujian Tengah Semester',
                'deskripsi' => 'Ujian Tengah Semester akan dilaksanakan pada tanggal 2-5 September 2024.',
                // 'tanggal_upload' => '2024-08-26',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'judul' => 'Pendaftaran Kegiatan Ekstrakurikuler',
                'deskripsi' => 'Pendaftaran untuk kegiatan ekstrakurikuler semester ini dibuka hingga 30 Agustus 2024.',
                // 'tanggal_upload' => '2024-08-27',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'judul' => 'Perubahan Jadwal Pelajaran',
                'deskripsi' => 'Ada perubahan jadwal pelajaran untuk mata pelajaran Matematika mulai bulan September.',
                // 'tanggal_upload' => '2024-08-28',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
            [
                'judul' => 'Workshop Kewirausahaan',
                'deskripsi' => 'Workshop kewirausahaan akan diadakan pada tanggal 10 September 2024.',
                // 'tanggal_upload' => '2024-08-29',
                'users_id' => 1, // Pastikan ID ini ada di tabel users
                'created_at' => now(),
            ],
        ]);
    }
}
