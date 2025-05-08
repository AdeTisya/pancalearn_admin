<?php

namespace App\Filament\Resources\JawabanSiswaResource\Pages;

use App\Filament\Resources\JawabanSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJawabanSiswas extends ListRecords
{
    protected static string $resource = JawabanSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
