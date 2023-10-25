<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncomingletterResource\Pages;
use App\Filament\Resources\IncomingletterResource\RelationManagers;
use App\Models\Incomingletter;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IncomingletterResource extends Resource
{
    protected static ?string $model = Incomingletter::class;
    protected static ?string $navigationGroup = 'Data Surat';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Surat Masuk';


    protected static ?string $modelLabel = 'Surat Masuk';
    protected static ?string $pluralModelLabel = 'Surat Masuk';

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('session_id')
                    ->relationship('session', 'nama_tahun')
                    ->required()->label('Tahun Surat'),
                TextInput::make('il_noagenda')->required()->label('No Agenda'),
                TextInput::make('il_nosurat')->required()->label('No Surat'),
                DatePicker::make('il_tglsurat')->required()->label('Tanggal Surat'),
                DatePicker::make('il_tglterima')->required()->label('Tanggal Diterima'),
                TextInput::make('il_perihal')->required()->label('Perihal'),
                TextInput::make('il_asal')->required()->label('Asal'),
                TextInput::make('il_isiringkas')->label('Isi Ringkas'),
                FileUpload::make('il_file')->required()->image()->preserveFilenames()
                    ->downloadable()->label('Berkas'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('il_file')->label('Berkas'),
                TextColumn::make('il_noagenda')->label('No Agenda'),
                TextColumn::make('il_nosurat')->label('No Surat'),
                TextColumn::make('il_tglsurat')->date()->label('Tanggal Surat'),
                TextColumn::make('il_tglterima')->date()->label('Tanggal Diterima'),
                TextColumn::make('il_perihal')->label('Perihal'),
                TextColumn::make('il_asal')->label('Asal'),
                TextColumn::make('il_isiringkas')->label('Isi Ringkas'),
                TextColumn::make('session_id')->toggleable(isToggledHiddenByDefault: true)->label('Tahun Aktif'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncomingletters::route('/'),
            'create' => Pages\CreateIncomingletter::route('/create'),
            'edit' => Pages\EditIncomingletter::route('/{record}/edit'),
        ];
    }
}
