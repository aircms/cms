<?php

namespace App\Console\Commands;

use aircms\settings\Facades\Settings;
use App\Models\Auth\User;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Console\Command;

class Test extends Command
{
    protected $signature   = 'test';
    protected $description = 'test command';

    public function handle()
    {
        /** @var UserRepository|User $user */
        $user = User::find(5);
        $user->assignRole('administrator');
    }
}
