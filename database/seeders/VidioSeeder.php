<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VidioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vidios')->insert([
            [
                'judul' => 'Ikan',
                'url' => 'abnsja',
                'created_at' => now(),
            ],
        ]);
    }
}
