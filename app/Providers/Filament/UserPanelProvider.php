<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\EditProfile;
use App\Filament\Pages\Auth\Login;
use App\Filament\Pages\Home;
use App\Filament\Pages\NinValidation;
use Filament\Enums\UserMenuPosition;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class UserPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('user')
            ->path('user')
            ->viteTheme('resources/css/filament/user/theme.css')
            ->login(Login::class)
            ->passwordReset()
            ->registration()
            ->profile(EditProfile::class, isSimple: false)
            ->spa(hasPrefetching: true)
            ->navigationItems([
                NavigationItem::make('profile')
                    ->label(fn (): string => __('Profile'))
                    ->icon(Heroicon::UserCircle)
                    ->sort(300)
                    ->url(fn (): string => EditProfile::getUrl()),
                NavigationItem::make('fund')
                    ->label(fn (): string => __('Fund Wallet'))
                    ->icon(Heroicon::Wallet)
                    ->sort(1)
                    ->url(fn (): string => EditProfile::getUrl()),
                NavigationItem::make('expenses')
                    ->label(fn (): string => __('Expenses'))
                    ->icon(Heroicon::ArrowsRightLeft)
                    ->sort(2)
                    ->url(fn (): string => EditProfile::getUrl()),
                NavigationItem::make('person')
                    ->label(fn (): string => __('Personalization'))
                    ->sort(103)
                    ->group('NIN Services')
                    ->url(fn (): string => EditProfile::getUrl()),
                NavigationItem::make('ipe')
                    ->label(fn (): string => __('IPE Clearance'))
                    ->sort(104)
                    ->group('NIN Services')
                    ->url(fn (): string => EditProfile::getUrl()),
//                NavigationItem::make('validation')
//                    ->label(fn (): string => __('NIN Validation'))
//
//                    ->url(fn (): string => NinValidation::getUrl()),
                NavigationItem::make('modification')
                    ->label(fn (): string => __('NIN Modification'))
                    ->group('NIN Services')
                    ->sort(106)
                    ->url(fn (): string => EditProfile::getUrl()),
                NavigationItem::make('delink')
                    ->label(fn (): string => __('NIN Delinking'))
                    ->group('NIN Services')
                    ->sort(107)
                    ->url(fn (): string => EditProfile::getUrl()),
                NavigationItem::make('vslip')
                    ->label(fn (): string => __('vNIN Slip'))
                    ->group('NIN Services')
                    ->sort(108)
                    ->url(fn (): string => EditProfile::getUrl()),

                NavigationItem::make('bvn')
                    ->label(fn (): string => __('BVN Verification'))
                    ->group('BVN Services')
                    ->sort(200)
                    ->url(fn (): string => EditProfile::getUrl()),

                NavigationItem::make('bvn_retrieve')
                    ->label(fn (): string => __('BVN Retrieval'))
                    ->group('BVN Services')
                    ->sort(201)
                    ->url(fn (): string => EditProfile::getUrl()),

                NavigationItem::make('bvn_change')
                    ->label(fn (): string => __('BVN Modification'))
                    ->group('BVN Services')
                    ->sort(202)
                    ->url(fn (): string => EditProfile::getUrl()),

                NavigationItem::make('data')
                    ->label(fn (): string => __('Data'))
                    ->sort(3)
                    ->icon(Heroicon::UserCircle)
                    ->url(fn (): string => EditProfile::getUrl()),
                NavigationItem::make('airtime')->sort(4)
                    ->label(fn (): string => __('Airtime'))
                    ->icon(Heroicon::UserCircle)
                    ->url(fn (): string => EditProfile::getUrl()),
                NavigationItem::make('support')
                    ->label(fn (): string => __('support'))
                    ->icon(Heroicon::UserCircle)
                    ->sort(301)
                    ->url(fn (): string => EditProfile::getUrl()),

            ])
            ->colors([
                'primary' => Color::Blue,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth(Width::Full)
            ->brandName('Ufus Data')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Home::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
//                AccountWidget::class,
//                FilamentInfoWidget::class,
            ])
//            ->userMenu(position: UserMenuPosition::Sidebar)
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
