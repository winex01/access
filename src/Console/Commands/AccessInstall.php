<?php

namespace Winex01\Access\Console\Commands;

use Illuminate\Console\Command;
use Winex01\Access\Models\Access;
use Winex01\Access\Console\Commands\Traits\Migrations;

class AccessInstall extends Command
{
    use Migrations;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'access:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install access package.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $exists = Access::exists();

        if (!$exists) {
            $this->migrate();
        }else {
            $this->info('Nothing to install.');
        } 
    }
}
