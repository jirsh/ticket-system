<div class="p-3 bg-slate-800 rounded text-lg flex flex-col items-start space-y-3">
    <div>author: {{ $ticket->author }}</div>
    @if ($isEditing)
    <div class="flex flex-row space-x-3">
        <input class="p-2 rounded text-lg text-black" type="text" wire:model="ticket.title">
        <button wire:click="save" class="rounded-lg bg-teal-500 p-2">Save</button>
    </div>
    @else
    <div>subject: {{ $ticket->title }}</div>
    @endif

    <div class="flex flex-row space-x-3">
        <div class="rounded-lg @if($ticket->status == 'open') bg-green-500 @else bg-red-500 @endif}} p-2">{{
            $ticket->status }}
        </div>
        <button wire:click="delete" class="rounded-lg bg-red-500 p-2">Delete</button>
        <button wire:click="switchStatus" class="rounded-lg bg-blue-500 p-2">@if($ticket->status == 'open') Close
            @else
            Open @endif</button>
        @if (!$isEditing)
        <button wire:click="edit" class="rounded-lg bg-teal-500 p-2">Edit</button>
        @endif
    </div>
</div>