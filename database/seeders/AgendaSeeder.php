<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agendas')->insert([
            [
                'judul' => 'Meeting Project A',
                'tanggal_mulai' => '2024-09-01',
                'tanggal_selesai' => '2024-09-01',
                'jam_pelaksanaan' => '10:00',
                'image' => '',
                'penyelenggara' => 'PT. XYZ',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Training Laravel',
                'tanggal_mulai' => '2024-09-10',
                'tanggal_selesai' => '2024-09-12',
                'jam_pelaksanaan' => '09:00',
                'image' => '',
                'penyelenggara' => 'PT. ABC',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
