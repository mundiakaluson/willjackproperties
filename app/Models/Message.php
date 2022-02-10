<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'message';

    /**
     * Serialization
     * @var
     */
    protected $hidden = ['chat_id', 'sender_id', 'receiver_id', 'message_id'];

    protected $fillable = ['chat_id', 'sender_id', 'receiver_id', 'message_id', 'is_seen', 'message'];

    public function user () {
        return $this->belongsTo('App\Model\User');
    }
}
