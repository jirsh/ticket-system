<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/app.js') }}"></script>
    @livewireStyles
    <title>Ticket system</title>
</head>

<body class="bg-slate-600 min-h-screen text-white container mx-auto flex flex-col">
    <main class="mt-3 flex flex-col space-y-3">
        @yield('content')
    </main>
    <footer class="mt-auto p-3">
        Ticket system
    </footer>
    @yield('scripts')
    @livewireScripts
</body>

</html>