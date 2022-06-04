<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReplyRequest;
use App\Models\Reply;
use App\Models\Attachment;
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
        
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                if (!$file->isValid())
                    continue;
                
                $attachment = new Attachment;
                $attachment->original_file_name = $file->getClientOriginalName();
                $attachment->reply()->associate($reply);
                $attachment->save();
                $file->store('files/' . $attachment->id);
            }
        }

        return redirect()->route('ticket.show', ['id' => $ticketId]);
    } 
}
