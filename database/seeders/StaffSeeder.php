<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'nama' => 'Dr. Andi Pratama',
                'posisi' => 'Guru Matematika',
                'image' => '',
                'email' => 'andi.pratama@example.com',
                'no_telp' => '+628123456789',
                'created_at' => now(),
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'posisi' => 'Guru Bahasa Inggris',
                'image' => '',
                'email' => 'siti.nurhaliza@example.com',
                'no_telp' => '+628987654321',
                'created_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'posisi' => 'Guru Fisika',
                'image' => '',
                'email' => 'budi.santoso@example.com',
                'no_telp' => '+628345678901',
                'created_at' => now(),
            ],
            [
                'nama' => 'Rina Dewi',
                'posisi' => 'Guru Kimia',
                'image' => '',
                'email' => 'rina.dewi@example.com',
                'no_telp' => '+628654321098',
                'created_at' => now(),
            ],
            [
                'nama' => 'Ahmad Zainuddin',
                'posisi' => 'Guru Biologi',
                'image' => '',
                'email' => 'ahmad.zainuddin@example.com',
                'no_telp' => '+628876543210',
                'created_at' => now(),
            ],
        ]);
    }
}
