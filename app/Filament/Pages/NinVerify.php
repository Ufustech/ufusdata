<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use UnitEnum;

class NinVerify extends Page
{
    protected string $view = 'filament.pages.nin-verify';
    protected static string | UnitEnum | null $navigationGroup = 'NIN Services';
    protected static ?int $navigationSort  = 100;
    protected static ?string $title = 'NIN Verification System';
    protected static ?string $navigationLabel = 'NIN Varification';
}
