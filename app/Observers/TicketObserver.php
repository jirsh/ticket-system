<?php

namespace App\Observers;

use App\Models\Ticket;

class TicketObserver
{
    /**
     * Handle the Ticket "deleting" event.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return void
     */
    public function deleting(Ticket $ticket)
    {
        // $ticket->replies()->delete(); // This line acording to laravel docs does NOT fire events because it's a collection which is what we want.
        foreach ($ticket->replies as $reply)
            $reply->delete();
    }
}
