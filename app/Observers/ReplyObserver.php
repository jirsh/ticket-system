<?php

namespace App\Observers;

use App\Models\Reply;

class ReplyObserver
{
    /**
     * Handle the Reply "deleting" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function deleting(Reply $reply)
    {
        // $reply->attachments()->delete(); // This line acording to laravel docs does NOT fire events because it's a collection which is what we want.
        foreach ($reply->attachments as $attachment)
            $attachment->delete();
    }
}
