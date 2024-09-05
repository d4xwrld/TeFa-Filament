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

    <!-- Scripts -->
    @vite(['resources/css/flowbite.min.css', 'resources/js/flowbite.min.js'])
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" /> --}}

    @include ('layouts.navbar')

</head>

<body>
    <div class="w-full flex flex-col md:flex-row items-center justify-center my-12 pt-4">
        <!-- Text Container -->
        <div class="w-full md:w-1/2 md:text-left p-4 md:p-12 text-container">
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">RPL</span>
                Nekat
            </h1>
            <p class="text-lg font-normal text-black lg:text-xl line-clamp-3">
                Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term
                value
                and drive economic growth.
            </p>
        </div>
        <!-- Image Container -->
        <div class="flex justify-center md:justify-end w-full md:w-1/2 h-full md:h-auto mt-6 md:mt-0">
            <div class="relative">
                <!-- Make sure the circle stays circular -->
                <div class="absolute inset-0 bg-indigo-700 rounded-full -z-10 w-[100%] h-[100%] aspect-square">
                </div>
                <!-- Adjust image size to maintain correct proportions -->
                <img class="rounded-full w-64 h-64 md:w-80 md:h-80 object-cover" src="{{ asset('images/logo.png') }}"
                    alt="image description">
            </div>
        </div>
    </div>

    <!-- Section for products with wave SVG -->
    <section id="products">
        <div class="mt-24">
            <!-- Wave SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 400">
                <path fill="#3D3B8E" fill-opacity="1"
                    d="M0,64L20,101.3C40,139,80,213,120,240C160,267,200,245,240,218.7C280,192,320,160,360,165.3C400,171,440,213,480,197.3C520,181,560,107,600,90.7C640,75,680,117,720,128C760,139,800,117,840,117.3C880,117,920,139,960,170.7C1000,203,1040,245,1080,261.3C1120,277,1160,267,1200,250.7C1240,235,1280,213,1320,213.3C1360,213,1400,235,1420,245.3L1440,256L1440,400L1420,400C1400,400,1360,400,1320,400C1280,400,1240,400,1200,400C1160,400,1120,400,1080,400C1040,400,1000,400,960,400C920,400,880,400,840,400C800,400,760,400,720,400C680,400,640,400,600,400C560,400,520,400,480,400C440,400,400,400,360,400C320,400,280,400,240,400C200,400,160,400,120,400C80,400,40,400,20,400L0,400Z">
                </path>
            </svg>
            <!-- Product Content Section -->
            <div style="background-color: #3D3B8E;">
                <div class="container mx-auto p-8 flex-col">
                    <h2 class="text-4xl font-extrabold text-white text-center mb-8">Our Products</h2>
                    <div class="flex flex-col md:flex-row">
                        @foreach ($posts as $post)
                            <div class="w-full md:w-1/2">
                                <div
                                    class="max-w-sm bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
                                    <a href="#">
                                        <img class="rounded-t-lg" src="{{ url('storage/' . $post->image_url) }}"
                                            alt="" />
                                    </a>
                                    <div class="p-5">
                                        <a href="#">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $post->title }}
                                            </h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            {{ $post->description }}
                                        </p>
                                        <a href="#"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Read more
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
