<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="flex flex-col justify-between min-h-screen font-sans leading-normal text-gray-800 antialiased bg-gray-100">
    <x-jet-banner />

    <!-- Page Heading -->
    <header class="relative flex justify-between items-center h-24 py-4 px-4 bg-white">
        <div class="flex items-center w-full">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="items-center inline-flex">
                    <x-jet-application-mark class="block h-20 w-20" />
                </a>
            </div>
            <div class="flex items-center justify-end flex-1 text-sm text-right md:pl-10 sm:text-base">
                <a href="{{route('register')}}" class="ml-3 sm:ml-6">Register</a>
                <a href="{{route('login')}}" class="ml-3 sm:ml-6">Login</a>
                <a href="https://github.com/hmreumann/memorybuilder">
                    <svg class="w-6 ml-3 fill-current sm:w-8 sm:ml-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>GitHub</title>
                        <path d="M10 0a10 10 0 0 0-3.16 19.49c.5.1.68-.22.68-.48l-.01-1.7c-2.78.6-3.37-1.34-3.37-1.34-.46-1.16-1.11-1.47-1.11-1.47-.9-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.9 1.52 2.34 1.08 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.1.39-1.99 1.03-2.69a3.6 3.6 0 0 1 .1-2.64s.84-.27 2.75 1.02a9.58 9.58 0 0 1 5 0c1.91-1.3 2.75-1.02 2.75-1.02.55 1.37.2 2.4.1 2.64.64.7 1.03 1.6 1.03 2.69 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.85l-.01 2.75c0 .26.18.58.69.48A10 10 0 0 0 10 0"></path>
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="lg:flex-1 lg:flex lg:flex-col" role="main">
        <div class="bg-white">
            <div class="pt-16 pb-16 px-9 text-2xl" style="max-width: 700px; margin: auto">
                <p>Do you have an exam soon?</p>
                <strong class="underline">Do you need to remember lots of concepts by memory?</strong>
                <p>Would you like to <span class="font-black">push your brain</span> and save those concepts in your long-term memory storage?</p>
                <p class="italic text-gray-500">If you do, you are in the right place.</p>
                <p class="mt-6">Memorizing concepts sometimes is needed, and it's not easy. It is normal to spend a lot of time reading with the uncertainty if you are going to remember those things in the exam.</p>
                <p class="mt-6"><strong>MemoryBuilder</strong> is the partner that will test you as many times as you need in order to check yourself.</p>
                <p class="mt-6">First, build your questionaries. Questions and Answers. That's it. Specially those that you want to memorize.</p>
                <p class="italic text-gray-500">This can be done like a way of studying.</p>
                <p class="mt-6">Then, <span class="font-black">start the test</span>. The questions will be shown <span class="font-black">randomly</span> without the answer, you should think about it or speak it out loud.</p>
                <p class="mt-6"><span class="italic font-black">No mystery, no magic recipes</span>. You must dig very deep into your brain in order to find the answer. <br><span class="italic text-gray-500">The thinking effort is what matters.</span></p>
                <p class="mt-6">With each question, you will be able to check the answer and decide whether you should see that question again or not.</p>
                <p class="mt-6 italic"><span class="font-black">Repetition is the key.</span> <br>
                    The memories that you recall tend to stick around and become much stronger.</p>
            </div>
        </div>
    </main>

    <footer class="pt-4 pb-6 text-sm text-center bg-white" role="contentinfo">
        <ul class="flex flex-col justify-center list-none md:flex-row">
            <li class="md:mr-2">
                © <a href="https://memorybuilder.xyz" title="MemoryBuilder">MemoryBuilder</a> {{date("Y")}}.
            </li>

            <li>
                Built with <a href="https://laravel.com" title="Laravel" class="text-blue-700 hover:text-blue-800">Laravel</a>, 
                <a href="https://laravel-livewire.com/" title="Livewire" class="text-blue-700 hover:text-blue-800">Livewire</a>
                and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework" class="text-blue-700 hover:text-blue-800">Tailwind CSS</a>.
            </li>
        </ul>
        <div x-data="" class="mt-2">
            <p class="block text-sm text-gray-600">
                Email
                <a class="text-gray-600 font-semibold hover:text-gray-700" href="mailto:hmreumann@hotmail.com" target="__blank">
                    hmreumann@hotmail.com
                </a>
            </p>
        </div>
    </footer>

    @stack('modals')

    @livewireScripts
</body>

</html>