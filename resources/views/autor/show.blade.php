<x-layouts.app title="Autores y sus libros">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative">
                <h1 class="text-xl">Libros por autor</h1>
            </div>
        </div>
        <div class="relative flex rounded-xl border shadow-lg items-center border-neutral-200 dark:border-neutral-700 px-4">
                <div class="relative overflow-x-auto w-full">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Cabecera
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Datos
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Autor
                                </th>
                                <td class="px-6 py-4">
                                    {{ $autor->nombre }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Edad
                                </th>
                                <td class="px-6 py-4">
                                    {{ $autor->edad }}
                                </td>
                            </tr>     
                        </tbody>
                    </table><br>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Libro
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ISBN
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Editorial
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de publicación
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Portada
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($autor->libros as $libro)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $libro->titulo }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $libro->ISBN }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $libro->editorial }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $libro->fechaPublicacion }}
                                    </td>
                                    <td>
                                        <img src="{{ asset("storage/".$libro->portada) }}" class="w-100">
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</x-layouts.app>

