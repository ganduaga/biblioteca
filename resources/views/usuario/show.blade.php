<x-layouts.app title="Devolución de libros">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative">
                <h1 class="text-xl">Usuario con libros en Prestamo</h1>
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
                                    Usuario
                                </th>
                                <td class="px-6 py-4">
                                    {{ $usuario->nombre }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Correo electrónico
                                </th>
                                <td class="px-6 py-4">
                                    {{ $usuario->email }}
                                </td>
                            </tr>  
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Dirección
                                </th>
                                <td class="px-6 py-4">
                                    {{ $usuario->direccion }}
                                </td>
                            </tr> 
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Teléfono
                                </th>
                                <td class="px-6 py-4">
                                    {{ $usuario->telefono }}
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
                                Fecha de prestamo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de devolución
                            </th>
                            <th>
                                Acción
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuario->libros as $libro)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $libro->titulo }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $libro->pivot->fechaprestamo }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $libro->pivot->fechadevolucion }}
                                    </td>
                                    <td>
                                        @if (!$libro->pivot->fechadevolucion)
                                            <flux:button href="{{ route('librousuario.devolucion', $libro->pivot->id) }}" variant="filled" class="object-center inline-block">Devolver libro</flux:button>
                                        @endif
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    @if (session()->has("mensaje"))
        <script>
            alert("{{ session()->get('mensaje') }}");
        </script>
    @endif
</x-layouts.app>

