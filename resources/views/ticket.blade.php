@extends('layouts.app')

@section('content')

<div class="flex flex-col space-y-3">
    <livewire:show-ticket :ticket="$ticket" />
    <div class="flex flex-col space-y-3">
        @foreach ($replies as $reply)
        <livewire:show-reply :reply="$reply" />
        @endforeach
    </div>
    {{$replies->links()}}
    <form class="flex flex-col bg-slate-800 p-3 rounded space-y-3 text-black" id="post-ticket"
        action="/reply/{{$ticket->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        <div class="p-1 text-sm text-red-500 rounded bg-slate-700 flex flex-col space-y-1">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <textarea class="p-3 rounded" name="body" id="body" cols="30" rows="10"
            placeholder="Please explain the issue that you're having"></textarea>
        <input class="bg-slate-700 p-3 rounded text-white file:rounded file:p-2" name="files[]" type="file"
            multiple></input>
        <input class="bg-slate-700 hover:bg-slate-600 transition-colors py-2 px-3 rounded text-white cursor-pointer"
            type="submit" value="Submit reply">
    </form>
</div>

@endsection