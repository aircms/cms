<?php

namespace App\Models\YAML2Blade\parser;


use Illuminate\Support\Arr;

class PushParser extends AbstractParser implements IParser
{
    public function bladeBegin()
    {
        $begin = sprintf('@push("%s")', $this->section[$this->getAccessor()]);
        return $this->line($begin);
    }

    public function bladeContent()
    {
        $content = Arr::wrap($this->section['content']);
        return $this->line(implode("\n", $content));
    }

    public function bladeEnd()
    {
        return $this->line("@endpush");
    }
}
