<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alumnis')->insert([
            [
                'nama' => 'John Doe',
                'lulusan' => '2018',
                'image' => '',
                'pesan' => 'Selalu berusaha mencapai yang terbaik!',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Jane Smith',
                'lulusan' => '2020',
                'image' => '',
                'pesan' => 'Jangan pernah berhenti belajar.',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
