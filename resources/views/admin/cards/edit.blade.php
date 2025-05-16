<x-app-layout>

    <div class="container mx-auto px-4 py-6">

        <div class="max-w-xl mx-auto">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6">
                    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Editar carta
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

                    <form action="{{ route('admin.cards.update',$card->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" id="name" name="name" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                      dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ old('name',$card->name) }}">
                        </div>

                        <div>
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <input type="text" id="description" name="description" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                      dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ old('description', $card->description) }}">
                        </div>

                        <div>
                            <label for="game_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Juego</label>
                            <select name="game_id" id="game_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       onchange="fetchCardTypes(this.value)">
                                <option disabled value="" selected>Selecciona un juego</option>
                                @foreach($games as $game)
                                    <option value="{{ $game->id }}" {{ old('game_id',$card->game_id) == $game->id ? 'selected' : '' }}>
                                        {{ $game->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="card_type_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Carta</label>
                            <select id="card_type_id" name="card_type_id" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Selecciona un tipo</option>
                                @foreach($cardTypes as $type)
                                    <option value="{{ $type->id }}" {{ (old('card_type_id', $card->card_type_id) == $type->id) ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                                    <input type="file" name="image" id="image"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                    @if(isset($card) && $card->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $card->image) }}" alt="Imagen actual" class="w-32 h-42  rounded">
                                        </div>
                                    @endif

                        </div>


                        <div class="text-right">
                            <a href="{{ route('admin.cards.index') }}"
                                class="inline-block text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white mr-4">Cancelar</a>
                            <button type="submit"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                                       dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Editar carta
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

        <script>
            async function fetchCardTypes(gameId) {
                const typeSelect = document.getElementById('card_type_id');
                typeSelect.innerHTML = '<option value="">Cargando tipos...</option>';

                if (!gameId) {
                    typeSelect.innerHTML = '<option value="">Selecciona un juego primero</option>';
                    return;
                }

                const response = await fetch(`/admin/card-types/by-game/${gameId}`);
                const data = await response.json();

                if (data.length === 0) {
                    typeSelect.innerHTML = '<option value="">Sin tipos disponibles</option>';
                } else {
                    typeSelect.innerHTML = '<option value="" disabled selected>Selecciona un tipo</option>';
                    data.forEach(type => {
                        const option = document.createElement('option');
                        option.value = type.id;
                        option.text = type.name;
                        typeSelect.appendChild(option);
                    });
                }
            }

              // Cargar los tipos si ya hay un juego seleccionado (por carga inicial)
            document.addEventListener('DOMContentLoaded', function () {
                const selectedGameId = document.getElementById('game_id').value;
                if (selectedGameId) {
                    fetchCardTypes(selectedGameId).then(() => {
                        // Seleccionar el tipo guardado después de cargar tipos
                        const selectedTypeId = "{{ old('card_type_id', $card->card_type_id) }}";
                        if (selectedTypeId) {
                            document.getElementById('card_type_id').value = selectedTypeId;
                        }
                    });
                }
            });
        </script>
</x-app-layout>