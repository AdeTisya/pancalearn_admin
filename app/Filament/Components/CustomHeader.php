<?php

namespace App\Filament\Components;

use Filament\Panels\Components\Header;

class CustomHeader extends Header
{
    protected function getHeading(): string
    {
        return 'Pancalearn';
    }
}
