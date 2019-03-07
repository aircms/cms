<?php

namespace App\Models\YAML2Blade\parser;


abstract class AbstractParser
{
    protected $section;
    protected $indent = 0;

    public function __construct($section, $indent = 0)
    {
        $this->section = $section;
        $this->indent = $indent;
    }

    public function bladeBegin()
    {
        return $this->line();
    }

    public function bladeEnd()
    {
        return $this->line();
    }

    public function getAccessor()
    {
        $className = collect(explode("\\", static::class))->last();
        return substr(strtolower($className), 0, -strlen("Parser"));
    }

    public function bladeContent()
    {
        return $this->line();
    }

    protected function line($string = "")
    {
        return str_repeat("\t", $this->indent) . "\n" . $string . "\n";
    }
}
