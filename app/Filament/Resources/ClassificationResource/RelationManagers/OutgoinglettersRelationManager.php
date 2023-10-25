<?php

namespace App\Filament\Resources\ClassificationResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OutgoinglettersRelationManager extends RelationManager
{
    protected static string $relationship = 'outgoingletters';
    protected static ?string $title = 'Surat Keluar';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('session_id')
                    ->relationship('session', 'nama_tahun')
                    ->preload()
                    ->label('Tahun Aktif'),
                TextInput::make('ol_noagenda')
                    ->required()
                    ->maxLength(255)->label('No Agenda'),
                TextInput::make('ol_nosurat')
                    ->required()
                    ->maxLength(255)->label('No Surat'),
                DatePicker::make('ol_tglsurat')
                    ->required()->label('Tanggal Surat'),
                DatePicker::make('ol_tglinput')
                    ->required()->label('Tanggal Input'),
                TextInput::make('ol_perihal')
                    ->required()
                    ->maxLength(255)->label('Perihal'),
                TextInput::make('ol_jenissurat')
                    ->required()
                    ->maxLength(255)->label('Jenis Surat'),
                FileUpload::make('ol_file')->image()->preserveFilenames()
                    ->downloadable()->label('Berkas'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                ImageColumn::make('ol_file')->label('Berkas'),
                TextColumn::make('ol_noagenda')->label('No Agenda'),
                TextColumn::make('ol_nosurat')->label('No Surat'),
                TextColumn::make('ol_tglsurat')->date()->label('Tanggal Surat'),
                TextColumn::make('ol_tglinput')->date()->label('Tanggal Input'),
                TextColumn::make('ol_perihal')->label('Perihal'),
                TextColumn::make('ol_jenissurat')->label('Jenis Surat'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->label('Tambah Surat Keluar'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
