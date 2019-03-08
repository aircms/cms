<?php

namespace App\Models\YAML2Blade\parser;


class ExtendsParser extends AbstractParser implements IParser
{
    public function bladeBegin()
    {
        $begin = sprintf('@extends("%s")', $this->section[$this->getAccessor()]);
        return $this->line($begin);
    }
}
