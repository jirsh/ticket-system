<input type="text" wire:model="search" type="search" class="self-end p-2 text-black rounded" placeholder="Search" />
@foreach($tickets as $ticket)
<x-tickets.preview :id="$ticket->id" :title="$ticket->title" :author="$ticket->author" :status="$ticket->status" />
@endforeach
{{ $tickets->links() }}