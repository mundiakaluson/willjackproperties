<?php

namespace App\Http\Livewire;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Chat extends Component
{
    use WithPagination;
    
    public $sender_id, $receiver_id, $conversation, $chat, $chat_id, $message_id,
            $message_content, $message, $available_admins, $is_seen;
    public $get_messages;

    public function mount($sender_id, $receiver_id) {
        $this->get_messages = Message::where('sender_id', $sender_id)
                                ->where('receiver_id', $receiver_id)
                                ->get();
        $this->is_seen = 0;
        $this->available_admins = User::all()->where('is_admin', 1);
    }

    public function updated () {
        $this->get_messages = Message::where('sender_id', $this->sender_id)
                                ->where('receiver_id', $this->receiver_id)
                                ->latest()
                                ->take(10)
                                ->get();
    }

    public function sendMessage () {
        $this->message_id = hexdec(uniqid());
        $this->chat_id = $this->sender_id . '-' . Str::orderedUuid() . '-' . $this->receiver_id;
        $this->chat = Message::create([
            'chat_id' => $this->chat_id,
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'is_seen' => $this->is_seen,
            'message_id' => $this->message_id,
            'message' => $this->message,
        ]);

        $this->chat->save();
        $this->message = '';

        event(new MessageSent(
            $this->message,
            $this->sender_id,
            $this->receiver_id,
            $this->chat_id,
            $this->is_seen,
            $this->message_id,
        ));
    }

    public function clear () {
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
