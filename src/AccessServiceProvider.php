<?php

namespace Winex01\Access;

use Illuminate\Support\ServiceProvider;
use Winex01\Access\Console\Commands\AccessKey;
use Winex01\Access\Console\Commands\AccessInstall;
use Winex01\Access\Console\Commands\AccessMigrate;
use Winex01\Access\Console\Commands\AccessMigrateFresh;
use Winex01\Access\Console\Commands\AccessMigrateRollback;

class AccessServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'winex01';
    protected $packageName = 'access';
    protected $commands = [
        AccessInstall::class,
        AccessMigrate::class,
        AccessMigrateFresh::class,
        AccessMigrateRollback::class,
        AccessKey::class,
    ];
}
