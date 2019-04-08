<?php

namespace App\Console\Commands\theme;

use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class ThemeClear extends Command
{
    protected $signature = 'theme:clear';
    protected $description = 'clear cached themes';

    public function handle()
    {
        $directory = storage_path("views");
        $finder = Finder::create()->depth(0)->in($directory);
        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            if ($file->isDir()) {
                dump("delete dir: " . $file->getRealPath());
                $this->deleteDir($file->getRealPath());
                continue;
            }
            unlink($file->getRealPath());
        }
    }

    private function deleteDir($dir)
    {
        $finder = Finder::create()->depth(0)->in($dir);
        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            if ($file->isDir()) {
                $this->deleteDir($file->getRealPath());
                continue;
            }
            unlink($file->getRealPath());
        }

        rmdir($dir);
    }
}
