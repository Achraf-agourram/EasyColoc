<x-guest-layout>
    
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-900">
            Créer un compte
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            Rejoignez la colocation et gérez vos dépenses facilement.
        </p>
    </div>

    <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="rounded-md shadow-sm space-y-4">
            <div>
                <label for="fname" class="block text-sm font-medium text-gray-700">Prénom</label>
                <input id="fname" name="firstName" type="text" autocomplete="name" required autofocus
                    value="{{ old('name') }}"
                    class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm transition duration-200 bg-gray-50" 
                    placeholder="Jean Dupont">
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-500" />
            </div>

            <div>
                <label for="lname" class="block text-sm font-medium text-gray-700">Nom</label>
                <input id="lname" name="lastName" type="text" autocomplete="name" required autofocus
                    value="{{ old('name') }}"
                    class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm transition duration-200 bg-gray-50" 
                    placeholder="Jean Dupont">
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-500" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email</label>
                <input id="email" name="email" type="email" autocomplete="email" required 
                    value="{{ old('email') }}"
                    class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm transition duration-200 bg-gray-50" 
                    placeholder="nom@exemple.com">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500" />
            </div>

            <div class="mt-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo de profil (Optionnel)</label>
                <input id="photo" name="photo" type="file" 
                    class="mt-1 block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-indigo-50 file:text-indigo-700
                    hover:file:bg-indigo-100
                    border border-gray-300 rounded-lg bg-gray-50 focus:outline-none cursor-pointer" />
                <x-input-error :messages="$errors->get('photo')" class="mt-2 text-xs text-red-500" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input id="password" name="password" type="password" autocomplete="new-password" required 
                    class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm transition duration-200 bg-gray-50" 
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                    class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm transition duration-200 bg-gray-50" 
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-500" />
            </div>
        </div>

        <div>
            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out shadow-md hover:shadow-lg">
                S'inscrire
            </button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Déjà un compte ? 
            <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-500 underline decoration-indigo-200 underline-offset-4">
                Se connecter
            </a>
        </p>
    </div>


</x-guest-layout>