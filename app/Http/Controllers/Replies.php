<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostNewReplyRequest;
use App\Models\Reply;
use App\Models\Attachment;

class Replies extends Controller
{
    /**
     * Store a new blog post.
     *
     * @param  \App\Http\Requests\PostNewReplyRequest  $request
     * @return Illuminate\Http\Response
     */
    public function post(PostNewReplyRequest $request, $ticketId)
    {
        $validated = $request->validated();

        $reply = new Reply;
        $reply->body = $validated['body'];
        $reply->ticket_id = $ticketId;
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
