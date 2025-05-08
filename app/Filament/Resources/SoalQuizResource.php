<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SoalQuizResource\Pages;
use App\Filament\Resources\SoalQuizResource\RelationManagers;
use App\Models\SoalQuiz;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class SoalQuizResource extends Resource
{
    protected static ?string $model = SoalQuiz::class;

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quiz';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('quiz_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('pertanyaan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('jenis_soal')
                    ->required()
                    ->label('Jenis Soal')
                    ->options([
                        'pilihan_ganda' => 'Pilihan Ganda',
                        'isian' => 'Isian',
                        'essay' => 'Essay',
                    ]),
                Forms\Components\FileUpload::make('gambar_soal')
                    ->required(),
                Forms\Components\TextInput::make('bobot_nilai')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('quiz_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_soal'),
                Tables\Columns\ImageColumn::make('gambar_soal')
                    ->circular(),
                Tables\Columns\TextColumn::make('bobot_nilai')
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
            'index' => Pages\ListSoalQuizzes::route('/'),
            'create' => Pages\CreateSoalQuiz::route('/create'),
            'edit' => Pages\EditSoalQuiz::route('/{record}/edit'),
        ];
    }
}
