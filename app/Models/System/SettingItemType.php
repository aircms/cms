<?php

namespace App\Traits;


class SettingItemType
{
    public function types()
    {
        return [
            'string'    => '字符串',
            'hide'      => '关键信息',
            'text'      => '纯文本',
            'rich_text' => '富文本',
            'integer'   => '整数',
            'double'    => '小数',
            'boolean'   => '开关',
            'split'     => '分割线',
            'single'    => '单选',
            'multi'     => '多选',
        ];
    }

    public function typeDescription($type)
    {
        return array_get($this->types(), $type, 'N/A');
    }
}
