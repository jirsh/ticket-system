<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTicketRequest;
use App\Models\Ticket;
use App\Models\Reply;
use App\Models\Attachment;

class TicketsController extends Controller
{
    /**
     * Renders the homepage
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index', []);
    }

    /**
     * Stores a new ticket with a reply.
     *
     * @param  \App\Http\Requests\CreateTicketRequest  $request
     * @return Illuminate\Http\Response
     */
    public function store(CreateTicketRequest $request)
    {
        $validated = $request->validated();

        $ticket = new Ticket;
        $ticket->title = $validated['title'];
        $ticket->author = $validated['email'];
        $ticket->save();

        $reply = new Reply;
        $reply->body = $validated['body'];
        $reply->ticket()->associate($ticket);
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

        return redirect()->route('ticket.show', ['id' => $ticket->id]);
    } 

    /**
     * Store a new blog post.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('ticket', [
            'ticket' => $ticket, 
            'replies' => $ticket->replies()
                                ->orderBy('updated_at', 'desc')
                                ->paginate(5)
                            ]);
    } 
}
