<?php

namespace App\Filament\Pages;


use Filament\Pages\Page;
use UnitEnum;

class NinValidation extends Page
{


    protected string $view = 'filament.pages.nin-validation';
    protected static string | UnitEnum | null $navigationGroup = 'NIN Services';
    protected static ?int $navigationSort  = 105;
    protected static ?string $title = 'NIN Validation System';
    protected static ?string $navigationLabel = 'NIN Validation';

}
