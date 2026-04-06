<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head', ["title" => 'Poster App'])
</head>

<body
    class="bg-[#FDFDFC] dark:bg-zinc-950 dark:text-white text-[#1b1b18] flex flex-col p-6 lg:p-8 lg:justify-start min-h-screen">
    <header class="w-full flex justify-between lg:max-w-full max-w-83.75 text-sm mb-6 not-has-[nav]:hidden">
        <x-app-logo />
        @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
            @auth
            <a href="{{ route('dashboard') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                Dashboard
            </a>
            @else
            <a href="{{ route('login') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                Log in
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                Register
            </a>
            @endif
            @endauth
        </nav>
        @endif
    </header>

    <div class="flex w-full h-full">
        {{ $slot }}
    </div>

    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif


    @fluxScripts
</body>

</html>