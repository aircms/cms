<?php

namespace App\Models\YAML2Blade;


use App\Models\YAML2Blade\parser\IParser;
use App\Models\YAML2Blade\parser\TEMPLATEParser;
use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Yaml;

class Parser
{
    public static function parse($yaml)
    {
        $parseData = Yaml::parse($yaml);
        return self::array2Blade($parseData);
    }

    public static function parse2File($yaml, $file)
    {
        $blade = self::parse($yaml);
        $filePath = $file . ".blade.php";

        if (!is_dir(dirname($filePath))) {
            File::makeDirectory(File::dirname($filePath), 0755, true);
        }
        return File::put($filePath, $blade);
    }

    private static function array2Blade($arrayData, $indent = 0)
    {
        $templateClass = TEMPLATEParser::class;
        $items = "";
        foreach ($arrayData as $section) {
            if (is_string($section)) {
                $items .= $section;
                continue;
            }

            $parserClass = str_replace("TEMPLATE", ucfirst($section['type']), $templateClass);

            /** @var IParser $sectionParser */
            $sectionParser = new $parserClass($section, $indent);
            $items .= $sectionParser->bladeBegin();

            $content = $sectionParser->bladeContent();
            if (is_string($content)) {
                $items .= $content;
            } elseif (is_array($content)) {
                $items .= self::array2Blade($content, 1);
            }


            $items .= $sectionParser->bladeEnd();
        }

        return trim($items);
    }
}
