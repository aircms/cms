<?php

namespace App\Models\YAML2Blade\parser;


class SectionParser extends AbstractParser implements IParser
{
    public function bladeBegin()
    {
        $begin = sprintf('@section("%s")', $this->section[$this->getAccessor()]);
        return $this->line($begin);
    }

    public function bladeContent()
    {
        return $this->section['content'];
    }

    public function bladeEnd()
    {
        return $this->line("@endsection");
    }
}
