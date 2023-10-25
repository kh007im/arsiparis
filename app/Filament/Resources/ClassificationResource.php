<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassificationResource\Pages;
use App\Filament\Resources\ClassificationResource\RelationManagers;
use App\Models\Classification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClassificationResource extends Resource
{
    protected static ?string $model = Classification::class;
    protected static ?string $navigationGroup = 'Data Surat';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Klasifikasi';


    protected static ?string $modelLabel = 'Klasifikasi';
    protected static ?string $pluralModelLabel = 'Klasifikasi';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('cls_kode')->required()->label('Kode'),
                TextInput::make('cls_namakode')->required()->label('Nama Kode'),
                TextInput::make('cls_nmrkode')->required()->label('No Kode'),
                TextInput::make('cls_keterangan')->required()->label('Keterangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cls_kode')->label('Kode'),
                TextColumn::make('cls_namakode')->label('Nama Kode'),
                TextColumn::make('cls_nmrkode')->label('No Kode'),
                TextColumn::make('cls_keterangan')->label('Keterangan'),
            ])
            ->filters([
                SelectFilter::make('cls_kode')
                    ->options([
                        'KP' => 'Kepegawaian',
                        'KU' => 'Keuangan',
                        'PP' => 'Pendidikan dan Pengajaran',
                    ])->label('Kode'),
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
            RelationManagers\OutgoinglettersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClassifications::route('/'),
            'create' => Pages\CreateClassification::route('/create'),
            'edit' => Pages\EditClassification::route('/{record}/edit'),
        ];
    }
}
