<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>EasyColocation</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                <a href="#" class="text-2xl hover:opacity-80 transition">
                                    🏠 <span class="font-black text-indigo-600 ml-1">ColocApp</span>
                                </a>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link href="#" class="font-bold">
                                    {{ __('Colocations') }}
                                </x-nav-link>
                                <x-nav-link href="#" class="font-bold">
                                    {{ __('Dépenses') }}
                                </x-nav-link>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                            <div class="flex items-center bg-green-50 px-3 py-1 rounded-full border border-green-100">
                                <span class="text-xs font-black text-green-700 uppercase mr-1">Réputation:</span>
                                <span class="text-sm font-bold text-green-600">{{ Auth::user()->reputation }}</span> </div>

                            <div class="ms-3 relative" x-data="{ dropdownOpen: false }">
                                <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-700 flex items-center justify-center mr-2 shadow-sm">
                                            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="photo de profil">
                                        </div>
                                        {{ Auth::user()->firstName }}
                                    </div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1.1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>

                                <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 w-48 rounded-xl shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 italic">Mon Profil</a>
                                    
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 font-bold hover:bg-red-50">
                                            Se déconnecter
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="-me-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link href="#">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                    </div>
                </div>
            </nav>

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
