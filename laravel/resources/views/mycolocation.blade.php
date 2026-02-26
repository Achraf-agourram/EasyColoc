<x-app-layout>
    
    @if($activeMembership)
        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    
                    <div class="h-32 bg-indigo-600 w-full flex items-center px-8">
                        <div class="h-20 w-20 bg-white rounded-2xl shadow-lg flex items-center justify-center text-4xl">
                            🏠
                        </div>
                    </div>

                    <div class="p-8 pt-12 relative">
                        <div class="mb-8">
                            <h1 class="text-3xl font-black text-gray-900 tracking-tight mb-2">
                                {{ $activeMembership->colocation->name }}
                            </h1>
                            
                            <div class="flex items-start text-gray-500 bg-gray-50 p-4 rounded-xl border border-gray-100">
                                <svg class="w-6 h-6 mr-3 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.244a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="text-lg leading-relaxed">
                                    {{ $activeMembership->colocation->address }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2 mb-10">
                            <span class="flex h-3 w-3 rounded-full bg-green-500"></span>
                            <span class="text-sm font-bold text-gray-600 uppercase tracking-widest">Colocation Active</span>
                        </div>

                        <hr class="border-gray-100 mb-8">

                        <div class="flex flex-wrap gap-4">
                            <a href="/mycolocation/{{ $activeMembership->colocation->token }}" class="flex-1 bg-indigo-600 text-white text-center py-4 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">
                                Accéder à la colocation et gérer les dépenses
                            </a>
                        </div>
                    </div>
                </div>

                <p class="mt-6 text-center text-sm text-gray-400 italic">
                    Vous êtes actuellement dans la colocation "appartement".
                </p>
            </div>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <div class="mb-8">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                        {{ __('Ma Colocation') }}
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">Gérez votre espace de vie et vos membres.</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-12 text-center">
                    <div class="mx-auto h-24 w-24 bg-indigo-50 rounded-3xl flex items-center justify-center mb-6">
                        <span class="text-5xl">🏘️</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Pas de colocation active</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">
                        Une seule colocation active est autorisée par utilisateur. 
                        Créez-en une maintenant pour inviter vos amis et partager vos dépenses !
                    </p>
                    
                    <a href="/mycolocation/new" 
                    class="inline-flex items-center px-8 py-4 bg-indigo-600 border border-transparent rounded-xl font-bold text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-lg shadow-indigo-100">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Créer ma colocation
                    </a>

                    <button
                    class="inline-flex items-center px-8 py-4 bg-indigo-600 border border-transparent rounded-xl font-bold text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-lg shadow-indigo-100">
                        Rejoindre une colocation
                    </button>
                </div>

            </div>
        </div>
    @endif
</x-app-layout>