<x-app-layout>

    <style>
        a > img { display: none}
        a:hover > img { display: inline-block; }
    </style>

    <div class="container mx-auto px-4 py-6">

        <div class="max-w-5xl mx-auto">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Lista de Cartas
                        </h5>
                        <a href="{{ route('admin.cards.create') }}"
                            class="bg-primary-500 text-white px-4 py-2 mb-4 rounded">Crear Carta</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nombre</th>
                                    <th scope="col" class="px-6 py-3">Descripción</th>
                                    <th scope="col" class="px-6 py-3">Juego</th>
                                    <th scope="col" class="px-6 py-3">Tipo de Carta</th>
                                    <th scope="col" class="px-6 py-3">Accciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cards as $card)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">

                                            @if ($card->image)
                                                <button data-tooltip-target="tooltip-image-{{ $card->id }}" type="button"
                                                    class="font-medium text-indigo-600 hover:underline">
                                                    {{ $card->name }}
                                                </button>

                                                <div id="tooltip-image-{{ $card->id }}" role="tooltip"
                                                    class="absolute z-20 invisible inline-block px-0 py-0 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 tooltip dark:bg-gray-700 dark:border-gray-600">
                                                    <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->name }}"
                                                        class="w-70 h-90  rounded" />
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            @else
                                            {{ $card->name }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $card->description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $card->game->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $card->cardType->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.cards.edit', $card) }}"
                                                class="text-blue-600 hover:text-blue-900">Editar</a>
                                            <form action="{{ route('admin.cards.destroy', $card) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>


</x-app-layout>
