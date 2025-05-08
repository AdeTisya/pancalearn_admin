<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationGroup;
use Rupadana\ApiService\ApiService;
use Rupadana\ApiService\ApiServicePlugin;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            ->spa()
            ->sidebarFullyCollapsibleOnDesktop()
            //->header(\App\Filament\Components\CustomHeader::class)

            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Akademik')
                    ->icon('heroicon-o-building-library'),

                NavigationGroup::make()
                    ->label('Absensi')
                    ->icon('heroicon-o-calendar-days'),

                NavigationGroup::make()
                    ->label('Quiz')
                    ->icon('heroicon-o-clipboard-document-list'),

                NavigationGroup::make()
                    ->label('Manajemen Guru & Siswa')
                    ->icon('heroicon-o-user-group'),

                NavigationGroup::make()
                    ->label('Pengaturan')
                    ->icon('heroicon-o-cog-8-tooth'),              
                
            ])

            ->colors([
                'primary' => 'rgb(99, 102, 241)',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
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
            ])
            ->plugins([
                ApiServicePlugin::make()
            ])


            ->brandLogo(asset('storage/gambar/logo2.png'), )

            
            ->font('Merriweather');
    }
}
