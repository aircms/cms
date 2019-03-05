<?php

namespace App\Models;

use App\Traits\QueryOrder;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use QueryOrder;

    protected $fillable = ['phone_number', 'email', 'name', 'sex', 'message', 'reply', 'reply_channel', 'title', 'address'];

    public function scopeReplied($query)
    {
        return $query->whereNotNull('reply');
    }

    public function scopeWaitingForReply($query)
    {
        return $query->whereNull('reply')->orWhere('reply', '');
    }

    public function getSexTextAttribute()
    {
        return ['女士', '先生'][$this->sex];
    }

    public function getReplyChannelTextAttribute()
    {
        $channels = explode(',', $this->reply_channel);
        return collect($channels)->map(function ($id) {
            return $this->channels()[$id];
        })->implode("/");
    }

    public function channels()
    {
        return ['网站', '短信', '电话', '邮箱', '快递', '传真'];
    }


}
