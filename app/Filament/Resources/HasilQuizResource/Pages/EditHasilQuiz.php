<?php

namespace App\Filament\Resources\HasilQuizResource\Pages;

use App\Filament\Resources\HasilQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHasilQuiz extends EditRecord
{
    protected static string $resource = HasilQuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
