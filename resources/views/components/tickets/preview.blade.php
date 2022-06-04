<a class="p-3 bg-slate-800 rounded flex flex-col items-start" href="/tickets/{{ $id }}">
    <div>title: {{ $title }}</div>
    <div>author: {{ $author }}</div>
    <div class="rounded-lg @if($status == 'open') bg-green-500 @else bg-red-500 @endif}} p-2">{{ $status }}</div>
</a>