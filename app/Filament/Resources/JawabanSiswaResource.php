<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JawabanSiswaResource\Pages;
use App\Filament\Resources\JawabanSiswaResource\RelationManagers;
use App\Models\JawabanSiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JawabanSiswaResource extends Resource
{
    protected static ?string $model = JawabanSiswa::class;

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quiz';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('hasil_quiz_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('soal_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pilihan_id')
                    ->numeric(),
                Forms\Components\Textarea::make('jawaban_text')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('jawaban_gambar')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nilai')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hasil_quiz_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('soal_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pilihan_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jawaban_gambar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListJawabanSiswas::route('/'),
            'create' => Pages\CreateJawabanSiswa::route('/create'),
            'edit' => Pages\EditJawabanSiswa::route('/{record}/edit'),
        ];
    }
}
