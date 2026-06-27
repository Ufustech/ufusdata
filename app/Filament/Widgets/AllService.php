<?php

namespace App\Filament\Widgets;

use App\Filament\Data\ServiceList;
use Filament\Widgets\Widget;

class AllService extends Widget
{
    protected string $view = 'filament.widgets.all-service';

    protected int | string | array $columnSpan = 'full';

    public function getServices(): array
    {
        return ServiceList::all();
    }
}
