<?php

namespace App\Filament\Resources\IncomingletterResource\Pages;

use App\Filament\Resources\IncomingletterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIncomingletter extends CreateRecord
{
    protected static string $resource = IncomingletterResource::class;
    protected static ?string $title = 'Tambah Surat Masuk';
}
