<?php

namespace App\Models\Post\Type;

class Fields
{
    public static function all()
    {
        return [
            'input'               => '字符串',
            'textarea'            => '文本',
            'select'              => '下拉(单选)',
            'select_multi'        => '下拉(多选)',
            'checkbox'            => '多选',
            'checkbox_list'       => '多选(列表)',
            'radio'               => '单选',
            'radio_list'          => '单选(列表)',
            'tag'                 => 'Tag 标签输入框',
            'upload_image_single' => '图片上传(单)',
            'upload_image_multi'  => '图片上传(多)',
            'ueditor'             => '富文本（UEditor）',
            'category'            => '内容分类选择',
        ];
    }

    public static function description($type)
    {
        return array_get(self::all(), $type, 'N/A');
    }
}
