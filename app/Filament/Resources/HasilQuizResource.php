<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HasilQuizResource\Pages;
use App\Filament\Resources\HasilQuizResource\RelationManagers;
use App\Models\HasilQuiz;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HasilQuizResource extends Resource
{
    protected static ?string $model = HasilQuiz::class;

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quiz';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('quiz_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('siswa_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('waktu_mulai')
                    ->required(),
                Forms\Components\DateTimePicker::make('waktu_selesai'),
                Forms\Components\TextInput::make('nilai_total')
                    ->numeric(),
                Forms\Components\TextInput::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('quiz_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('siswa_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('waktu_mulai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('waktu_selesai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai_total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListHasilQuizzes::route('/'),
            'create' => Pages\CreateHasilQuiz::route('/create'),
            'edit' => Pages\EditHasilQuiz::route('/{record}/edit'),
        ];
    }
}
