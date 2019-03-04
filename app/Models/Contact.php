<?php

namespace App\Models;

use App\Traites\QueryOrder;
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
}
