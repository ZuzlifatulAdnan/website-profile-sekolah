<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenghargaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penghargaans')->insert([
            [
                'judul' => 'Lomba Seni Antarsekolah',
                'deskripsi' => 'Sekolah kita berhasil meraih juara 1 dalam lomba seni antarsekolah se-kota.',
                // 'tanggal_upload' => '2024-08-15',
                'users_id' => 1,
                'gambar' => '',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
