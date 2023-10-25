<?php

namespace App\Filament\Widgets;

use App\Models\Incomingletter;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SuratMasukChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Surat Masuk';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = Trend::model(Incomingletter::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Surat Masuk',
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
