<?php

namespace Winex01\Access\Console\Commands\Traits;

use Illuminate\Support\Facades\Artisan;

trait Migrations
{
    protected $driver = 'access';
    protected $dbPath = 'vendor/winex01/access/database/access-migrations';

    public function migrate($fresh = false)
    {
        $this->info('Running migrations for the access database...');

        // Prepare the command options
        $options = [
            '--database' => $this->driver,
            '--path' => $this->dbPath,
        ];

        // Conditionally add the --fresh option
        if ($fresh) {
            $options['--fresh'] = true;
        }

        // Run the migration command
        Artisan::call('migrate', $options);

        $this->info('Migrations completed successfully.');
    }
}
