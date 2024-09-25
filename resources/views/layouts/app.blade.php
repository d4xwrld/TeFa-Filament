<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="bumblebee">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/output.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="w-screen">
            <div class="bg-white flex rounded-lg mx-4 shadow-md p-2">
                <div class="tmb-6">
                    <h2 class="text-2xl font-bold text-gray-800">KasirKu!</h2>
                    {{-- <p class="text-gray-600">Sign in</p> --}}
                </div>
                <div class="flex-grow"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="btn btn-secondary hover:bg-orange-700 text-white justify-end font-bold py-2 px-4 rounded focus:outline-none focus-shadow-outline">
                        Sign Out
                    </button>
                </form>
            </div>
            <div class="flex">
                <main class=flex-grow py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/aos.js') }}"></script>
<script>
    AOS.init();
</script>

</html>
