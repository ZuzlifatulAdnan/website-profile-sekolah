<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UsersSeeder::class,
            ProfileSeeder::class,
            KategoriBeritaSeeder::class,
            BeritaSeeder::class,
            JurusanSeeder::class,
            StaffSeeder::class,
            PengumumanSeeder::class,
            EventSeeder::class,
            MediaSeeder::class,
            AlumniSeeder::class,
            PesanSeeder::class,
            PpdbSeeder::class,
            HeroSeeder::class,
            PopupSeeder::class,
            AgendaSeeder::class,
            InfografisSeeder::class,
            EkskulSeeder::class,
            VidioSeeder::class,
        ]);
    }
}
