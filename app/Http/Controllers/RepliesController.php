<?php

namespace App\Http\Controllers;

use App\Helpers\AttachmentHelper;
use App\Http\Requests\CreateReplyRequest;
use App\Models\Reply;
use App\Models\Ticket;

class RepliesController extends Controller
{
    /**
     * Stores a new reply.
     *
     * @param  \App\Http\Requests\CreateReplyRequest  $request
     * @param  int $ticketId
     * 
     * @return Illuminate\Http\Response
     */
    public function store(CreateReplyRequest $request, $ticketId)
    {
        $validated = $request->validated();

        $ticket = Ticket::findOrFail($ticketId);

        $reply = new Reply;
        $reply->body = $validated['body'];
        $reply->ticket_id = $ticket->id;
        $reply->save();

        if ($request->hasFile('files'))
            AttachmentHelper::storeAttachments($request->file('files'), $reply);

        return redirect()->route('ticket.show', ['id' => $ticketId]);
    }
}
