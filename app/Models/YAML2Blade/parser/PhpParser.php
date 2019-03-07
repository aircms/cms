<?php

namespace App\Models\YAML2Blade\parser;


use Illuminate\Support\Arr;

class PhpParser extends AbstractParser implements IParser
{
    public function bladeBegin()
    {
        return $this->line("@php");
    }

    public function bladeEnd()
    {
        return $this->line('@endphp');
    }

    public function bladeContent()
    {
        $content = Arr::wrap($this->section['content']);

        return $this->line(implode("\n", $content));
    }
}
