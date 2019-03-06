<?php

namespace App\Models\Post\Type;

class Fields
{
    public static function all()
    {
        return [
            'input'         => '字符串',
            'textarea'      => '文本',
            'select'        => '下拉(单选)',
            'select_multi'  => '下拉(多选)',
            'checkbox'      => '多择',
            'checkbox_list' => '多择(列表)',
            'radio'         => '单选',
            'radio_list'    => '单选(列表)',
            'tag'           => 'Tag 标签输入框',
            'upload'        => '文件上传',
            'ueditor'       => '富文本（UEditor）',
            'category'      => '内容分类选择',
        ];
    }

    public static function description($type)
    {
        return array_get(self::all(), $type, 'N/A');
    }
}
