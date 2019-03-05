<?php

namespace App\Traits;


class SettingItemType
{
    public static function types()
    {
        return [
            'string'    => '字符串',
            'password'  => '机密文本',
            'text'      => '纯文本',
            'rich_text' => '富文本',
            'boolean'   => '开关',
            'split'     => '分割线',
            'single'    => '单选',
            'multi'     => '多选',
        ];
    }

    public static function typeDescription($type)
    {
        return array_get(self::types(), $type, 'N/A');
    }
}
