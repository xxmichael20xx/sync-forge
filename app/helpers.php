<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('getAllModules')) {
    /**
     * Retrieve all modules.
     *
     * @return \Nwidart\Modules\Module[]
     */
    function getAllModules(): array
    {
        if (class_exists(\Nwidart\Modules\Facades\Module::class)) {
            return \Nwidart\Modules\Facades\Module::all();
        }

        return [];
    }
}
