<x-app-layout>
    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 pb-6 border-b border-gray-100 gap-4">
            <div>
                <h1 class="text-3xl font-black text-gray-900 italic">name</h1>
                <p class="text-gray-500 text-sm mt-1">address</p>
            </div>
            
            <div class="flex space-x-3">
                <button class="bg-indigo-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100 text-sm">
                    + Nouvelle Dépense
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-8">
                
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                        <h3 class="font-black text-gray-800 uppercase text-xs tracking-widest">⚖️ Qui doit à qui ?</h3>
                        <span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-bold">Calcul Automatique</span>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-4 bg-indigo-50/50 rounded-xl border border-indigo-100">
                                <div class="flex items-center space-x-3">
                                    <span class="font-bold text-gray-700">Thomas</span>
                                    <span class="text-indigo-400">➡️</span>
                                    <span class="font-bold text-gray-900 underline decoration-indigo-300">Moi</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span class="text-lg font-black text-gray-900">24,50 €</span>
                                    <button class="bg-indigo-600 text-white text-[10px] uppercase tracking-tighter px-3 py-2 rounded-lg font-bold hover:bg-indigo-700">
                                        Marquer Payé
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-5 border-b border-gray-50 flex flex-wrap justify-between items-center gap-4">
                        <h3 class="font-black text-gray-800 uppercase text-xs tracking-widest">💸 Historique des Dépenses</h3>
                        
                        <form method="GET" action="#" class="flex items-center">
                            <select name="month" class="text-xs border-gray-200 rounded-lg bg-gray-50 focus:ring-indigo-500 font-bold text-gray-600">
                                <option value="">Tous les mois</option>
                                <option value="02">Février 2026</option>
                                <option value="01">Janvier 2026</option>
                            </select>
                        </form>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50/50 text-gray-400 text-[10px] uppercase font-black">
                                <tr>
                                    <th class="px-6 py-4 tracking-widest">Détails</th>
                                    <th class="px-6 py-4 tracking-widest text-center">Catégorie</th>
                                    <th class="px-6 py-4 tracking-widest text-right">Montant</th>
                                    <th class="px-6 py-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="hover:bg-gray-50/30 transition">
                                    <td class="px-6 py-4">
                                        <p class="font-bold text-gray-800">Courses Carrefour</p>
                                        <p class="text-[10px] text-gray-400 font-medium uppercase tracking-tighter">Payé par Marc • 22/02/2026</p>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-[10px] font-black uppercase">Alimentation</span>
                                    </td>
                                    <td class="px-6 py-4 text-right font-black text-gray-900">
                                        65,20 €
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-gray-300 hover:text-red-500 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-black text-gray-800 uppercase text-xs tracking-widest mb-6">👥 Les Colocataires</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-black shadow-inner">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-[10px] text-indigo-500 font-black uppercase tracking-widest">
                                        Owner
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs font-black text-green-600">+14 ⭐</p>
                                <p class="text-[8px] text-gray-400 uppercase font-bold">Réputation</p>
                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->person->isOwner)
                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <button class="w-full py-3 bg-gray-50 text-indigo-600 font-black text-[10px] uppercase tracking-widest rounded-xl border-2 border-dashed border-indigo-100 hover:bg-indigo-50 hover:border-indigo-300 transition">
                                + Inviter un membre
                            </button>
                        </div>
                    @endif
                </div>

                <div class="bg-red-50 rounded-2xl p-4 border border-red-100">
                    <p class="text-[10px] text-red-800 font-black uppercase mb-2">Attention</p>
                    <p class="text-[10px] text-red-600 leading-tight mb-3">Quitter une colocation avec une dette active impactera votre réputation (-1).</p>
                    <button class="w-full py-2 bg-white text-red-600 text-xs font-bold rounded-lg border border-red-200 hover:bg-red-100 transition">
                        Quitter la colocation
                    </button>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>