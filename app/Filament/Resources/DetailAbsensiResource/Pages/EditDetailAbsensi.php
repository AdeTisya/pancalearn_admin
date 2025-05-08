<?php

namespace App\Filament\Resources\DetailAbsensiResource\Pages;

use App\Filament\Resources\DetailAbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailAbsensi extends EditRecord
{
    protected static string $resource = DetailAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
