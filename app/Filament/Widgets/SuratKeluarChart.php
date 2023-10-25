<?php

namespace App\Filament\Widgets;

use App\Models\Outgoingletter;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SuratKeluarChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Surat Keluar';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(Outgoingletter::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Surat Keluar',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
