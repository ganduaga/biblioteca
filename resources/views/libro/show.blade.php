<x-layouts.app title="Prestamo de libros">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative">
                <h1 class="text-xl">Libro en Prestamo</h1>
            </div>
            
        </div>
        <div class="relative flex rounded-xl border shadow-lg items-center border-neutral-200 dark:border-neutral-700 px-4">
            <form action="{{ route('librousuario.prestamo',$libro) }}" method="post">
                @csrf
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
                            <th scope="col" class="px-6 py-3">
                                Portada del libro
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Titulo del libro 
                                </th>
                                <td class="px-6 py-4">
                                    {{ $libro->titulo }}
                                </td>
                                <td class="px-6 py-4" rowspan="9">
                                    <img src="{{ asset("storage/".$libro->portada) }}"/>
                                </td>
                            </tr>  
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    ISBN
                                </th>
                                <td class="px-6 py-4">
                                    {{ $libro->ISBN }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Autor
                                </th>
                                <td class="px-6 py-4">
                                    {{ $libro->autores->nombre }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Editorial
                                </th>
                                <td class="px-6 py-4">
                                    {{ $libro->editorial }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Temas que abarca
                                </th>
                                <td class="px-6 py-4">
                                    {{ $libro->tema }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Fecha de publicación
                                </th>
                                <td class="px-6 py-4">
                                    {{ $libro->fechaPublicacion }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Cantidad en existencia
                                </th>
                                <td class="px-6 py-4">
                                    {{ $libro->numcopias }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Persona a la que se presta el libro
                                </th>
                                <td class="px-6 py-4">
                                    <flux:select wire:model="usuario_id" placeholder="Elije un usuario" required class="mb-2 w-xl pl-4">
                                         @foreach ($usuarios as $usuario)
                                        <flux:select.option value="{{ $usuario->id }}">
                                            {{ $usuario->nombre }}
                                        </flux:select.option>
                                        @endforeach
                                    </flux:select>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Cantidad de copias en existencia
                                </th>
                                <td class="px-6 py-4">
                                    @if ($libro->numcopias >0)
                                        <flux:input type="submit" value="Prestar libro" class="w-xl mb-4 bg-cyan-500"/>    
                                    @else
                                        <flux:input type="submit" value="Prestar libro" disabled class="w-xl mb-4 bg-cyan-500"/>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>

