<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pesans')->insert([
            [
                'nama' => 'John Doe',
                'email' => 'john.doe@example.com',
                'pesan' => 'Saya ingin mengetahui lebih lanjut tentang program ekstrakurikuler di sekolah ini.',
                'created_at' => now(),
            ],
            [
                'nama' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'pesan' => 'Apakah pendaftaran untuk tahun ajaran baru sudah dibuka?',
                'created_at' => now(),
            ],
            [
                'nama' => 'Michael Johnson',
                'email' => 'michael.johnson@example.com',
                'pesan' => 'Saya mengalami kesulitan saat mencoba mengakses portal siswa. Mohon bantuan.',
                'created_at' => now(),
            ],
            [
                'nama' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'pesan' => 'Saya memiliki beberapa saran untuk meningkatkan kualitas layanan di sekolah.',
                'created_at' => now(),
            ],
            [
                'nama' => 'David Wilson',
                'email' => 'david.wilson@example.com',
                'pesan' => 'Bisakah Anda memberikan detail lebih lanjut mengenai kurikulum yang akan diterapkan tahun ini?',
                'created_at' => now(),
            ],
        ]);
    }
}
