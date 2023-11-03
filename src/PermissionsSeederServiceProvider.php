<?php

namespace Creode\PermissionsSeeder;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Creode\PermissionsSeeder\Commands\PermissionsSeederCommand;

class PermissionsSeederServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('permissions-seeder')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_permissions-seeder_table')
            ->hasCommand(PermissionsSeederCommand::class);
    }
}
