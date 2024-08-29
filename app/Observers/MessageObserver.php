<?php
namespace App\Observers;

use App\Models\Message;
use App\Notifications\NewMessages;

class MessageObserver
{
    public function created(Message $message)
    {
        
        $messages = Message::all();
        foreach($messages as $row) {
            $row->notify(new NewMessages($message));
        }
    }
}