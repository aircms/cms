<?php

namespace App\Models\YAML2Blade;


use App\Models\YAML2Blade\parser\IParser;
use App\Models\YAML2Blade\parser\TEMPLATEParser;
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
        return file_put_contents($file . ".blade.php", $blade);
    }

    private static function array2Blade($arrayData, $indent = 0)
    {
        $templateClass = TEMPLATEParser::class;
        $items = "";
        foreach ($arrayData as $section) {
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
