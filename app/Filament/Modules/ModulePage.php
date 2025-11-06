<?php

namespace App\Filament\Modules;

use Filament\Pages\Page;

abstract class ModulePage extends Page
{
    /**
     * Determine if the navigation item for this page should be registered.
     *
     * @return bool
     */
    public static function shouldRegisterNavigation(): bool
    {
        return static::userCanAccess();
    }

    /**
     * Determine if the page can be mounted.
     *
     * @return void
     */
    public function mount(): void
    {
        abort_unless(static::userCanAccess(), 403);
    }

    /**
     * Determine if the page is globally searchable.
     *
     * @return bool
     */
    public static function getGloballySearchable(): bool
    {
        return static::userCanAccess();
    }

}