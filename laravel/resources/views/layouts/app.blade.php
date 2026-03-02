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
                                <div class="text-2xl hover:opacity-80 transition">
                                    🏠 <span class="font-black text-indigo-600 ml-1">ColocApp</span>
                                </div>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link href="/mycolocation" class="font-bold">
                                    Colocations
                                </x-nav-link>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4" id="profileInfoContainer">
                            <div class="flex items-center bg-green-50 px-3 py-1 rounded-full border border-green-100">
                                <span class="text-xs font-black text-green-700 uppercase mr-1">Réputation:</span>
                                <span class="text-sm font-bold text-green-600">{{ Auth::user()->reputation }}</span>
                            </div>

                            <div class="ms-3 relative" x-data="{ dropdownOpen: false }">
                                <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex items-center justify-center mr-2 shadow-sm">
                                            <img class="rounded-full object-cover" src="{{ asset('storage/' . auth()->user()->photo) }}" alt="photo de profil">
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
                            Dashboard
                        </x-responsive-nav-link>
                    </div>
                </div>
            </nav>

            <main>
                {{ $slot }}
            </main>
        </div>

        <div id="toast-container" class="fixed top-5 right-5 z-[100] flex flex-col gap-3 w-full max-w-[320px]">

            @if (session('success'))
                <div class="toast-item flex items-center p-4 bg-black text-white rounded-xl shadow-2xl animate-in-right">
                    <div
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-500 rounded-full text-[10px]">
                        <i class="fa-solid fa-check text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-[11px] font-bold uppercase tracking-widest">{{ session('success') }}</p>
                        <p class="text-[9px] text-gray-400">Votre contenu est en ligne.</p>
                    </div>
                    <button onclick="this.parentElement.remove()" class="ml-auto text-gray-500 hover:text-white">
                        <i class="fa-solid fa-xmark text-xs"></i>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div
                        class="toast-item flex items-center p-4 bg-white border border-red-100 shadow-xl rounded-xl animate-in-right">
                        <div
                            class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-red-500 rounded-full text-[10px]">
                            <i class="fa-solid fa-exclamation text-white"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-[11px] font-bold uppercase tracking-widest text-red-600">Erreur de saisie</p>
                            <p class="text-[9px] text-gray-500">{{ $error }}</p>
                        </div>
                        <button onclick="this.parentElement.remove()" class="ml-auto text-gray-300 hover:text-gray-600">
                            <i class="fa-solid fa-xmark text-xs"></i>
                        </button>
                    </div>
                @endforeach
            @endif
        </div>

        <style>
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }

                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                    transform: scale(1);
                }

                to {
                    opacity: 0;
                    transform: scale(0.9);
                }
            }

            .animate-in-right {
                animation: slideInRight 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            }

            .toast-exit {
                animation: fadeOut 0.3s ease forwards;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toasts = document.querySelectorAll('.toast-item');

                toasts.forEach((toast) => {
                    setTimeout(() => {
                        toast.classList.add('toast-exit');
                        setTimeout(() => {
                            toast.remove();
                        }, 300);
                    }, 5000);
                });
            });
        </script>
    </body>
</html>
