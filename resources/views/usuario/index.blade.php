<x-layouts.app title="Usuarios">
    @if (session()->has("mensaje"))
        <script>
            alert("{{ session()->get('mensaje') }}");
        </script>
    @endif
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid grid-cols-3">
            <div class="relative object-center content-center">
                <h1 class="text-xl">Administración de usuarios</h1>
            </div>
            <div class="relative items-center content-center">
            <div class="relative flex rounded-xl border items-center shadow-lg border-neutral-200 dark:border-neutral-700 px-4 mb-2">
            <form action="{{ route('usuario.buscar') }}" method="post">
                @csrf
                <flux:input type="text" label="Buscar usuario" wire:model="usuario" 
                    placeholder="Ej. Tito Camotito" required  class="w-lg mb-2"/>
                <flux:input type="submit" value="Buscar" class="w-lg mb-4 bg-cyan-500"/>
            </form>
        </div>
            </div>
            <div class="fixed top-5 right-10">
                <flux:button href="{{ route('usuario.create') }}" variant="primary" class="object-center inline-block">Agregar Usuario</flux:button>
            </div>
        </div>
        <div class="relative h-full flex rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-lg">

        <div class="relative overflow-x-auto w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id del Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre del Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Correo Electrónico
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dirección
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Teléfono
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $usuario->id }}
                            </th>
                            <td class="px-6 py-4">
                                <a href="{{ route('usuario.show',[$usuario]) }}">
                                    {{ $usuario->nombre }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $usuario->edad }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $usuario->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $usuario->direccion }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $usuario->telefono }}
                            </td>
                        
                            <td class="px-6 py-4 flex object-rigth">
                            <flux:button href="{{ route('usuario.edit', $usuario) }}" variant="filled" class="object-center inline-block">Editar Usuario</flux:button>
                            <form action="{{ route('usuario.destroy',$usuario) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <flux:button variant="danger" type="submit" 
                                    class="object-center inline-block"
                                    onclick="return confirm('Estas seguro?')">
                                    Borrar Usuario
                                </flux:button>
                            </form>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
