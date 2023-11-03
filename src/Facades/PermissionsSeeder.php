<?php

namespace Creode\PermissionsSeeder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Creode\PermissionsSeeder\PermissionsSeeder
 */
class PermissionsSeeder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Creode\PermissionsSeeder\PermissionsSeeder::class;
    }
}
