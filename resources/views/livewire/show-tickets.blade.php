<div class="flex flex-col space-y-3">
    <div class="self-end flex flex-row space-x-3">
        <select name="" id="" class="p-2 text-black rounded" wire:model="filter">
            <option value="*">All</option>
            <option value="Open">Open</option>
            <option value="Closed">Closed</option>
        </select>
        <input type="text" wire:model="search" type="search" class="p-2 text-black rounded" placeholder="Search" />
    </div>
    @foreach($tickets as $ticket)
    <x-tickets.preview :id="$ticket->id" :title="$ticket->title" :author="$ticket->author" :status="$ticket->status" />
    @endforeach
    {{ $tickets->links('vendor.livewire.tailwind') }}
</div>