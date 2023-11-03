<?php

namespace Creode\PermissionsSeeder\Commands;

use Illuminate\Console\Command;

class PermissionsSeederCommand extends Command
{
    public $signature = 'permissions-seeder';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
