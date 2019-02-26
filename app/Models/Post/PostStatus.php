<?php

namespace App\Models\Post;

class PostStatus
{
    const STATUS_DRAFT   = 0;
    const STATUS_REVIEW  = 1;
    const STATUS_PUBLISH = 2;

    public static function descriptions()
    {
        return [
            self::STATUS_DRAFT   => '草稿',
            self::STATUS_REVIEW  => '审核',
            self::STATUS_PUBLISH => '发布',
        ];
    }

    public static function description($status)
    {
        return array_get(self::descriptions(), $status, 'N/A');
    }
}
