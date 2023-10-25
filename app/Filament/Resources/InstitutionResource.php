<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstitutionResource\Pages;
use App\Filament\Resources\InstitutionResource\RelationManagers;
use App\Models\Institution;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstitutionResource extends Resource
{
    protected static ?string $model = Institution::class;
    protected static ?string $navigationGroup = 'Master';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Lembaga';


    protected static ?string $modelLabel = 'Lembaga';
    protected static ?string $pluralModelLabel = 'Lembaga';


    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ins_nama')->required()->label('Nama Instansi'),
                TextInput::make('ins_email')->required()->label('Email'),
                TextInput::make('ins_telepon')->required()->label('No Telepon'),
                TextInput::make('ins_alamat')->required()->label('Alamat'),
                FileUpload::make('ins_logo')->required()->label('Logo')->downloadable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('ins_logo')->circular()->label('Logo'),
                TextColumn::make('ins_nama')->label('Nama Instansi'),
                TextColumn::make('ins_email')->label('Email'),
                TextColumn::make('ins_telepon')->label('No Telepon'),
                TextColumn::make('ins_alamat')->label('Alamat'),
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
            'index' => Pages\ListInstitutions::route('/'),
            'create' => Pages\CreateInstitution::route('/create'),
            'edit' => Pages\EditInstitution::route('/{record}/edit'),
        ];
    }
}
