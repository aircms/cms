<?php

namespace App\Models\YAML2Blade\parser;


class IncludeParser extends AbstractParser implements IParser
{
    public function bladeBegin()
    {
        $begin = sprintf('@include("%s")', $this->section[$this->getAccessor()]);
        return $this->line($begin);
    }
}
