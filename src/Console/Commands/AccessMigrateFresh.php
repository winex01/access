<?php

namespace Winex01\Access\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Winex01\Access\Console\Commands\Traits\Migrations;

class AccessMigrateFresh extends Command
{
    use Migrations;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'access:migrate:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run fresh migrations for the access database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Running fresh migrations for the access database...');
        
        // Run the fresh migration command
        Artisan::call('migrate:fresh', [
            '--database' => $this->driver,
            '--path' => $this->dbPath,
        ]);

        $this->info('Fresh migrations completed successfully.');
    }
}
