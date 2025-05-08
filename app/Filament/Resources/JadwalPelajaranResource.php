<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalPelajaranResource\Pages;
use App\Filament\Resources\JadwalPelajaranResource\RelationManagers;
use App\Models\JadwalPelajaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalPelajaranResource extends Resource
{
    protected static ?string $model = JadwalPelajaran::class;

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('guru_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('mapel_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kelas_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('hari')
                    ->required(),
                Forms\Components\TextInput::make('jam_mulai')
                    ->required(),
                Forms\Components\TextInput::make('jam_selesai')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('guru_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mapel_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelas_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hari'),
                Tables\Columns\TextColumn::make('jam_mulai'),
                Tables\Columns\TextColumn::make('jam_selesai'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListJadwalPelajarans::route('/'),
            'create' => Pages\CreateJadwalPelajaran::route('/create'),
            'edit' => Pages\EditJadwalPelajaran::route('/{record}/edit'),
        ];
    }
}
