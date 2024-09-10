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
    @vite(['resources/css/flowbite.min.css', 'resources/js/flowbite.min.js'])
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" /> --}}

    @include ('layouts.navbar')
</head>

<body>
    <div class="container">
        {{-- To-Do Improve the UI of the post detail page by adding a comment form and displaying the comments. --}}
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <h2>Comments</h2>
        @foreach ($post->comments as $comment)
            <article>
                <div class="flex items-center mb-4">
                    <div class="font-medium dark:text-white">
                        <p>{{ $comment->user->name }}</p>
                    </div>
                </div>
                <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $comment->content }}</p>
                <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400">
                    <p>Reviewed on <time
                            datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('F j, Y') }}</time>
                    </p>
                </footer>
            </article>
        @endforeach

        @auth
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" name="content" rows="4"
                            class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Post comment
                        </button>
                    </div>
                </div>
            </form>
        @endauth
    </div>
</body>
<script src="{{ asset('js/aos.js') }}"></script>
<script>
    AOS.init();
</script>

</html>
