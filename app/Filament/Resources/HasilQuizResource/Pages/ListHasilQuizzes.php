<?php

namespace App\Filament\Resources\HasilQuizResource\Pages;

use App\Filament\Resources\HasilQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHasilQuizzes extends ListRecords
{
    protected static string $resource = HasilQuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
