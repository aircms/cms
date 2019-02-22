<?php

namespace App\Console\Commands;

use aircms\settings\Facades\Settings;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class Test extends Command
{
    protected $signature   = 'test';
    protected $description = 'test command';

    public function handle()
    {
        dd(Settings::all(),Settings::get("mac.denis"));
    }
}
