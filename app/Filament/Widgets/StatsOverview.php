<?php

namespace App\Filament\Widgets;

use App\Models\Classification;
use App\Models\Disposition;
use App\Models\Incomingletter;
use App\Models\Outgoingletter;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Surat Masuk', Incomingletter::query()->count())
                ->description('Semua surat masuk')
                ->descriptionIcon('heroicon-m-cloud-arrow-down')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Surat Keluar', Outgoingletter::query()->count())
                ->description('Semua surat keluar')
                ->descriptionIcon('heroicon-m-cloud-arrow-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
            Stat::make('Klasifikasi Surat', Classification::query()->count())
                ->description('Semua klasifikasi surat')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('info'),
            Stat::make('Disposisi Surat', Disposition::query()->count())
                ->description('Semua disposisi surat')
                ->descriptionIcon('heroicon-m-rocket-launch')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
        ];
    }
}
