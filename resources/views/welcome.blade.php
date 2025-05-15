<x-app-layout>
<section class="bg-indigo-600 dark:bg-gray-800">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-yellow-300 md:text-5xl lg:text-6xl dark:text-white">DeckHub</h1>
        <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Construye, organiza y comparte tus mazos de cartas TCG favoritas.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
           @auth
            <a href="{{ route('profile.index') }}" class="bg-yellow-500 text-white px-6 py-3 rounded-lg shadow hover:bg-yellow-600 transition">
                Ir a mi Dashboard
            </a>
        @else
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="bg-yellow-500 text-white px-6 py-3 rounded-lg shadow hover:bg-yellow-600 transition">
                    Iniciar sesión
                </a>
                <a href="{{ route('register') }}" class="bg-transparent border-2 border-yellow-500 text-yellow-500 px-6 py-3 rounded-lg shadow hover:bg-yellow-100 transition">
                    Registrarse
                </a>
            </div>
        @endauth
        </div>
    </div>
</section>
<div class="container py-16 px-6 mx-auto dark:bg-gray-900">
    <h2 class="text-3xl md:text-4xl font-semibold text-center mb-8 dark:text-white">¿Qué puedes hacer aquí?</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-center">
    <div class="p-6 bg-indigo-600 shadow-lg rounded-lg dark:bg-gray-800">
        <h4 class="text-xl text-yellow-300 font-semibold mb-2 dark:text-white">📦 Crea Mazos</h4>
        <p class="text-white dark:text-gray-400">Arma tus mazos fácilmente seleccionando cartas de tu colección.</p>
    </div>
    <div class="p-6 bg-indigo-600 shadow-lg rounded-lg dark:bg-gray-800">
        <h4 class="text-xl text-yellow-300 font-semibold mb-2 dark:text-white">🔍 Explora Juegos</h4>
        <p class="text-white dark:text-gray-400">Soporte para múltiples juegos como Pokémon, Magic, Yu-Gi-Oh! y más.</p>
    </div>
    <div class="p-6 bg-indigo-600 shadow-lg rounded-lg dark:bg-gray-800">
        <h4 class="text-xl text-yellow-300 font-semibold mb-2 dark:text-white">🤝 Comparte con Otros</h4>
        <p class="text-white dark:text-gray-400">Haz públicos tus mazos y descubre los de otros jugadores.</p>
    </div>
</div>

</x-app-layout>