<?php

namespace App\Filament\Widgets;

use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\Staff;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Jumnlah extends BaseWidget
{
    protected function getStats(): array
    {
        // Ambil data dari database
        $totalUsers = User::count();
        $totalStaff = Staff::count(); 
        $totalJurusan = Jurusan::count();
        $totalEkstrakurikuler = Ekskul::count();

        return [
            Stat::make('User', $totalUsers),
            Stat::make('STAFF', $totalStaff),
            Stat::make('Jurusan', "$totalJurusan"),
            Stat::make('Ekstrakurikuler', "$totalEkstrakurikuler "),
        ];
    }
}
