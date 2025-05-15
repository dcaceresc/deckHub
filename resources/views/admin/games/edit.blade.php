<x-app-layout>


    <div class="container mx-auto px-4 py-6">

        <div class="max-w-xl mx-auto">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6">
                    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Editar juego
                    </h5>

                    @if ($errors->any())
                        <div class="mb-4 text-sm text-red-600 dark:text-red-400">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.games.update', $game->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" id="name" name="name" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                      dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ old('name', $game->name) }}">
                        </div>

                        <div class="text-right">
                            <a href="{{ route('admin.games.index') }}"
                                class="inline-block text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white mr-4">Cancelar</a>
                            <button type="submit"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                                       dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Crear permiso
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
