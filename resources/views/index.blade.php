@extends('layouts.app')

@section('content')

@foreach($tickets as $ticket)
<x-tickets.preview :id="$ticket->id" :title="$ticket->title" :author="$ticket->author" :status="$ticket->status" />
@endforeach
<x-tickets.post-form />
{{ $tickets->links() }}

@endsection