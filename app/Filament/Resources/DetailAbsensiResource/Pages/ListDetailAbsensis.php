<?php

namespace App\Filament\Resources\DetailAbsensiResource\Pages;

use App\Filament\Resources\DetailAbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailAbsensis extends ListRecords
{
    protected static string $resource = DetailAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
