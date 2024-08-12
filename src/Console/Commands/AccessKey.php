<?php

namespace Winex01\Access\Console\Commands;

use Illuminate\Console\Command;
use Winex01\Access\Models\Access;

class AccessKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'license {--key= : The license key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process the license key provided via the --key option';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         // Get the value of the --key option
         $licenseKey = $this->option('key');

         if (!$licenseKey) {
             $this->error('Please provide a valid license key using --key');
             return 1; // Return an error code
         }
 
         // Process the license key
         $this->info("Processing license key: $licenseKey");
 
         Access::create([
            'key' => $licenseKey
         ]);
         
         return 0; // Return a success code
    }
}
