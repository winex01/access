<?php

namespace Winex01\Access;

use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'winex01';
    protected $packageName = 'access';
    protected $commands = [];
}
