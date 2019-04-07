<?php

namespace App\Console\Commands;

use App\Models\Page\Page;
use App\Models\Page\Fragment;
use Illuminate\Console\Command;

class Theme extends Command
{
    protected $signature = 'theme:build';
    protected $description = 'biuld theme files';

    public function handle()
    {
        Fragment::generateAll();
        Page::generateAll();
    }
}
