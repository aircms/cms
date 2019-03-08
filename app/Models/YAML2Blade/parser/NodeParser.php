<?php

namespace App\Models\YAML2Blade\parser;


use Illuminate\Support\Arr;

class NodeParser extends AbstractParser implements IParser
{
    public function bladeBegin()
    {
        $attributes = Arr::get($this->section, 'attributes', []);
        $attributes = collect($attributes)->map(function ($value) {
            if (is_array($value)) {
                return implode(" ", $value);
            }
            return $value;
        })->all();

        $node = $this->section[$this->getAccessor()];
        $begin = html()->$node()->attributes($attributes)->open();
        return $this->line($begin);
    }

    public function bladeContent()
    {
        return $this->section['content'];
    }

    public function bladeEnd()
    {
        $node = $this->section[$this->getAccessor()];
        $end = html()->$node()->close();

        return $this->line($end);
    }
}
