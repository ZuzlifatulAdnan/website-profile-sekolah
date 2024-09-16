<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'section' => 'Visi dan Misi',
                'deskripsi' => 'Visi kami adalah menjadi lembaga pendidikan yang unggul dalam mencetak generasi masa depan yang berkualitas. Misi kami adalah menyediakan pendidikan berkualitas dengan pendekatan inovatif dan inklusif, serta mendukung perkembangan akademik dan non-akademik siswa.',
                'created_at' => now(),
            ],
            [
                'section' => 'Sejarah',
                'deskripsi' => 'Sekolah ini didirikan pada tahun 2000 dengan tujuan memberikan pendidikan berkualitas di bidang akademik dan non-akademik. Selama bertahun-tahun, kami telah berkembang pesat dan menjadi salah satu institusi pendidikan terkemuka di daerah ini.',
                'created_at' => now(),
            ],
            [
                'section' => 'Sambutan',
                'deskripsi' => 'Selamat datang di sekolah kami! Kami bangga dapat menyambut Anda dan keluarga dalam komunitas kami. Kami berkomitmen untuk menyediakan lingkungan belajar yang mendukung dan menginspirasi setiap siswa untuk mencapai potensi penuh mereka.',
                'created_at' => now(),
            ],
        ]);
    }
}
