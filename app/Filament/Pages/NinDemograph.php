<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use UnitEnum;
class NinDemograph extends Page
{
    protected string $view = 'filament.pages.nin-demograph';
    protected static string | UnitEnum | null $navigationGroup = 'NIN Services';
    protected static ?int $navigationSort  = 102;
    protected static ?string $title = 'Demographic Search System';
    protected static ?string $navigationLabel = 'NIN Demographic';
}
