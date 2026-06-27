<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Widget;
use Illuminate\Support\Number;

class UserBalance extends Widget
{
    protected int | string | array $columnSpan = 'full';


    protected string $view = 'filament.widgets.user-balance';
}
