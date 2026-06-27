<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AllService;
use App\Filament\Widgets\UserBalance;
use Filament\Pages\Dashboard;

class Home extends Dashboard
{

    public function getWidgets(): array
    {
        return [
            UserBalance::class,
            AllService::class,
        ];
    }
}
