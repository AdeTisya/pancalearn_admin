<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailAbsensiResource\Pages;
use App\Filament\Resources\DetailAbsensiResource\RelationManagers;
use App\Models\DetailAbsensi;
use App\Models\Siswa;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;


class DetailAbsensiResource extends Resource
{
    protected static ?string $model = DetailAbsensi::class;

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Absensi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('absensi_id')
                    ->required()
                    ->numeric(),
                    Forms\Components\Select::make('siswa_id')
                    ->label('Nama Siswa')
                    ->required()
                    ->options(
                        Siswa::query()
                            ->whereNotNull('nama_lengkap') // pastikan nama_lengkap tidak null
                            ->pluck('nama_lengkap', 'id')
                            ->toArray()
                    )
                    ->searchable(),
                Forms\Components\TextInput::make('status_kehadiran')
                    ->required(),
                Forms\Components\TextInput::make('waktu_absen'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('absensi_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('siswa_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_kehadiran'),
                Tables\Columns\TextColumn::make('waktu_absen'),
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
            'index' => Pages\ListDetailAbsensis::route('/'),
            'create' => Pages\CreateDetailAbsensi::route('/create'),
            'edit' => Pages\EditDetailAbsensi::route('/{record}/edit'),
        ];
    }
}
