<?php

namespace App\Filament\Resources\IncomingletterResource\Pages;

use App\Filament\Resources\IncomingletterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIncomingletters extends ListRecords
{
    protected static string $resource = IncomingletterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Surat Masuk'),
        ];
    }
}
