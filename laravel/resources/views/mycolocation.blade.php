<x-app-layout>
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
</x-app-layout>