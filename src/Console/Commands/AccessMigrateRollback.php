<?php

namespace Winex01\Access\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Winex01\Access\Console\Commands\Traits\Migrations;

class AccessMigrateRollback extends Command
{
    use Migrations;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'access:migrate:rollback';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback migrations for the access database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Rolling back migrations for the access database...');

        // Run the rollback command
        Artisan::call('migrate:rollback', [
            '--database' => $this->driver,
            '--path' => $this->dbPath,
        ]);

        $this->info('Rollback completed successfully.');
    }
}
