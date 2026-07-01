<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use UnitEnum;
class NinPhone extends Page
{
    protected string $view = 'filament.pages.nin-phone';
    protected static string | UnitEnum | null $navigationGroup = 'NIN Services';
    protected static ?int $navigationSort  = 101;
    protected static ?string $title = 'Phone to NIN Search System';
    protected static ?string $navigationLabel = 'NIN Phone';
}
