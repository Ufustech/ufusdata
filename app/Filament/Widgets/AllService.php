<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AllService extends Widget
{
    protected string $view = 'filament.widgets.all-service';

    protected int | string | array $columnSpan = 'full';

    public function getServices(): array
    {
        return [
            ['icon' => 'heroicon-o-identification',      'label' => 'NIN Search',         'desc' => 'Search by NIN',               'route' => '#'],
            ['icon' => 'heroicon-o-device-phone-mobile', 'label' => 'NIN by Phone',       'desc' => 'Search NIN by phone',         'route' => '#', 'active' => true],
            ['icon' => 'heroicon-o-users',               'label' => 'Search Demographic', 'desc' => 'Search by demographics',      'route' => '#'],
            ['icon' => 'heroicon-o-credit-card',         'label' => 'BVN Verification',   'desc' => 'Verify BVN details',          'route' => '#'],
            ['icon' => 'heroicon-o-phone',               'label' => 'BVN Retrieval',      'desc' => 'Search BVN by phone',         'route' => '#'],
            ['icon' => 'heroicon-o-user-circle',         'label' => 'Personalization',    'desc' => 'Submit Tracking ID for slip', 'route' => '#'],
            ['icon' => 'heroicon-o-document-check',      'label' => 'IPE Clearance',      'desc' => 'IPE clearance service',       'route' => '#'],
            ['icon' => 'heroicon-o-shield-check',        'label' => 'MOD IPE Clearance',  'desc' => 'MOD IPE clearance service',   'route' => '#'],
            ['icon' => 'heroicon-o-clipboard-document-check', 'label' => 'Submit Validation', 'desc' => 'Validate documents',      'route' => '#'],
            ['icon' => 'heroicon-o-document-text',       'label' => 'VNIN Slip',          'desc' => 'Generate VNIN Slip',          'route' => '#'],
            ['icon' => 'heroicon-o-pencil-square',       'label' => 'NIN Modification',   'desc' => 'Modify NIN details',          'route' => '#'],
            ['icon' => 'heroicon-o-pencil',              'label' => 'BVN Modification',   'desc' => 'Modify BVN details',          'route' => '#'],
            ['icon' => 'heroicon-o-signal',              'label' => 'Buy Data',           'desc' => 'Purchase data bundles',       'route' => '#'],
            ['icon' => 'heroicon-o-phone-arrow-up-right','label' => 'Buy Airtime',        'desc' => 'Purchase airtime',            'route' => '#'],
            ['icon' => 'heroicon-o-academic-cap',        'label' => 'EXAM PIN',           'desc' => 'Purchase exam pin',           'route' => '#'],
            ['icon' => 'heroicon-o-ellipsis-horizontal-circle', 'label' => 'Others',      'desc' => 'More services',               'route' => '#'],
        ];
    }
}
