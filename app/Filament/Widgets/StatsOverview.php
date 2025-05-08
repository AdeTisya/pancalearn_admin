<?php

namespace App\Filament\Widgets;

use App\Models\Siswa;
use App\Models\Guru;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $countSiswa = Siswa::count();
        $countGuru = Guru::count();
        return [

            Stat::make('Jumlah Siswa', $countSiswa),
            Stat::make('Jumlah Guru', $countGuru),
            //Stat::make('Average time on page', '3:12'),
        ];
    }
}
