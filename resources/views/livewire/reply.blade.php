<div class="p-3 bg-slate-800 rounded flex flex-col">
    @if($isEditing)
    <textarea class="p-3 rounded text-black" name="body" id="body" cols="30" rows="10"
        wire:model="reply.body"></textarea>
    <input class="bg-slate-700 p-3 rounded text-white file:rounded file:p-2" name="files[]" wire:model="files"
        type="file" multiple></input>
    <div class="flex flex-row space-x-1">
        <button class="text-slate-300" wire:click="save">save</button>
        <button class="text-slate-300" wire:click="delete">delete</button>
    </div>
    @else
    <textarea class="p-3 rounded text-white bg-slate-500" name="body" id="body" cols="30" rows="10"
        wire:model="reply.body" readonly></textarea>
    <div class="flex flex-row space-x-1">
        <button class="text-slate-300" wire:click="edit">edit</button>
        <button class="text-slate-300" wire:click="delete">delete</button>
    </div>
    @endif
    @foreach($reply->attachments()->get() as $attachment)
    <a class="p-3"
        href="{{route('attachment.download', ['id' => $attachment->id])}}">{{$attachment->original_file_name}}</a>
    @endforeach
</div>