<?php

namespace Winex01\Access\Console\Commands;

use Illuminate\Console\Command;
use Winex01\Access\Console\Commands\Traits\Migrations;

class AccessMigrate extends Command
{
    use Migrations;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'access:migrate {--fresh}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations for the access database with optional fresh option';


    /**
     * Execute the console command.
     */
    public function handle()
    {
         // Check if --fresh option is present
         $fresh = $this->option('fresh');

         // Call the migrate method from the trait
         $this->migrate($fresh);
    }
}
