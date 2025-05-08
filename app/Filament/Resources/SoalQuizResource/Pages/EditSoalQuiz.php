<?php

namespace App\Filament\Resources\SoalQuizResource\Pages;

use App\Filament\Resources\SoalQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoalQuiz extends EditRecord
{
    protected static string $resource = SoalQuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
