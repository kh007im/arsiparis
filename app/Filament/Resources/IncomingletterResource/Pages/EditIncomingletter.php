<?php

namespace App\Filament\Resources\IncomingletterResource\Pages;

use App\Filament\Resources\IncomingletterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncomingletter extends EditRecord
{
    protected static string $resource = IncomingletterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
