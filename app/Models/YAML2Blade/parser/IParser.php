<?php

namespace App\Models\YAML2Blade\parser;


interface IParser
{
    public function bladeBegin();

    public function bladeContent();

    public function bladeEnd();

    public function getAccessor();
}
