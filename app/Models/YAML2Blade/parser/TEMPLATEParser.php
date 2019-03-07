<?php

namespace App\Models\YAML2Blade\parser;


class TEMPLATEParser extends AbstractParser implements IParser
{
    public function bladeBegin()
    {
        return $this->line();
    }
}
