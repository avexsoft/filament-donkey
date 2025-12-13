<?php

declare(strict_types=1);

namespace Avexsoft\FilamentDonkey\Tests;

use Avexsoft\FilamentDonkey\FilamentDonkeyPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

/**
 * Even though dev-tools does not require avexsoft/filament, this class
 * is located here so that composer will not include it in production
 *
 * - Cannot use `Avexsoft\Filament` as composer will include in production
 * - Cannot use `Avexsoft\FilamentEx\Tests` as composer will not include it in autoload of packages, leading to test failures
 */
class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('test')
            ->path('test')
            ->brandName('Test Panel')
            ->plugins([FilamentDonkeyPlugin::make()]);
        // ->login()
        // ->middleware([
        //     EncryptCookies::class,
        //     AddQueuedCookiesToResponse::class,
        //     StartSession::class,
        //     AuthenticateSession::class,
        //     ShareErrorsFromSession::class,
        //     VerifyCsrfToken::class,
        //     SubstituteBindings::class,
        //     DisableBladeIconComponents::class,
        //     DispatchServingFilamentEvent::class,
        // ])
        // ->authMiddleware([
        //     Authenticate::class,
        // ]);
    }
}
