<?php

namespace App\Models\YAML2Blade\parser;


class FragmentParser extends AbstractParser implements IParser
{
    public function bladeBegin()
    {
        $begin = sprintf('@include("frontend.fragment.%s")', $this->section[$this->getAccessor()]);
        return $this->line($begin);
    }
}
