<?php

namespace App\Console\Commands\theme;

use App\Models\Page\Page;
use App\Models\Page\Fragment;
use Illuminate\Console\Command;

class ThemeBuild extends Command
{
    protected $signature = 'theme:build';
    protected $description = 'biuld theme files';

    public function handle()
    {
        Fragment::generateAll();
        Page::generateAll();
    }
}
