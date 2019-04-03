<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class Translate extends Command
{

    protected $signature = 'utils:translates';
    protected $description = 'show translate mappings';

    public function handle()
    {
        $type = 'zh';
        $dst = "all_messages.php";
        $dir = app('path.lang') . "/" . $type;
        $dstFile = app('path.lang') . "/" . $type . "/" . $dst;

        $finder = Finder::create()->files()->name("*.php")->in($dir);

        $data = [];
        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $data[$file->getBasename(".php")] = require $file->getRealPath();
        }

        $data = Arr::dot($data);

        $replaceArr = [];
        collect($data)->each(function ($value, $key) use (&$replaceArr) {
            $replaceKey = sprintf("@lang('%s')", $key);
            $replaceArr[$replaceKey] = $value;

            $paramValue = sprintf("'%s'", $value);
            $replaceKey = sprintf("__('%s')", $key);
            $replaceArr[$replaceKey] = $paramValue;
        });

        $viewDirs = Config::get('view.paths');
        foreach ($viewDirs as $viewDir) {
            $finder = Finder::create()->files()->name("*.blade.php")->in($viewDir);
            /** @var SplFileInfo $file */
            foreach ($finder as $file) {
                $filePath = $file->getRealPath();
                $fileContent = file_get_contents($filePath);
                $content = strtr($fileContent, $replaceArr);
                file_put_contents($filePath, $content);
            }
        }
    }
}
