<?php

namespace App\Http\Controllers;

use App\Helpers\AttachmentHelper;
use App\Http\Requests\CreateTicketRequest;
use App\Models\Ticket;

class TicketsController extends Controller
{
    /**
     * Stores a new ticket with a reply.
     *
     * @param  \App\Http\Requests\CreateTicketRequest  $request
     * @return Illuminate\Http\Response
     */
    public function store(CreateTicketRequest $request)
    {
        $validated = $request->validated();

        $ticket = Ticket::create($request->only(['title', 'author']));

        $reply = $ticket->replies()->create($request->only(['body']));

        if ($request->hasFile('files'))
            AttachmentHelper::storeAttachments($request->file('files'), $reply);

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
