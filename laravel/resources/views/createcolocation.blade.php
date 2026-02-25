<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-8 border-b border-gray-100 bg-indigo-600 text-white">
                    <h2 class="text-2xl font-bold italic">🏠 Configurer ma colocation</h2>
                </div>

                <form method="POST" action="/addColocation" class="p-8 space-y-8">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nom de la colocation</label>
                        <input type="text" name="name" id="name" required autofocus
                               class="block w-full px-4 py-4 rounded-xl border-gray-300 bg-gray-50 border focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                               placeholder="Ex: Le Loft de Bastille">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-500" />
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Adresse physique</label>
                        <input name="address" id="address" rows="3" required
                                  class="block w-full px-4 py-4 rounded-xl border-gray-300 bg-gray-50 border focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                                  placeholder="Rue, Code Postal, Ville..."></input>
                        <x-input-error :messages="$errors->get('address')" class="mt-2 text-xs text-red-500" />
                    </div>

                    <div class="flex items-center justify-between pt-6">
                        <a href="#" class="text-sm font-bold text-gray-400 hover:text-gray-600 transition">
                            Annuler
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-10 py-4 bg-indigo-600 border border-transparent rounded-xl font-bold text-white hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200 transition shadow-lg shadow-indigo-100">
                            Lancer la colocation
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-6 p-4 bg-amber-50 rounded-xl border border-amber-100 flex items-start">
                <span class="mr-3 text-amber-500 font-bold">💡</span>
                <p class="text-sm text-amber-800 leading-relaxed">
                    Une fois créée, un **Token d'invitation** générer pour vos futurs colocataires.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>