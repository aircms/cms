<?php

namespace App\Models;


class LinkModes
{
    public static function all()
    {
        return [
            "_self"   => '当前窗口',
            "_blank"  => '新窗口',
            "_parent" => '父窗口',
        ];
    }

    public static function description($type)
    {
        return array_get(self::all(), $type, 'N/A');
    }
}
