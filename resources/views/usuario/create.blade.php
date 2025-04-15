<x-layouts.app title="Altas autores">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative">
                <h1 class="text-xl">Altas de usuario</h1>
            </div>
            
        </div>
        <div class="relative flex rounded-xl border shadow-lg items-center border-neutral-200 dark:border-neutral-700 px-4">
            <form action="{{ route('usuario.store') }}" method="post">
                @csrf
                <flux:input type="text" label="Nombre del usuario" wire:model="nombre" 
                    name="nombre" placeholder="Ej. Tito Camotito" required  class="w-xl mb-2"/>
                <flux:input type="number" label="Edad del usuario" name="edad" 
                    class="w-64" required class="w-xl mb-2"/>
                <flux:input type="email" label="Correo del usuario" name="email" 
                    class="w-64" required class="w-xl mb-2"/>
                <flux:input type="text" label="Dirección del usuario" name="direccion" 
                    class="w-64" required class="w-xl mb-2"/>
                <flux:input type="tel" label="Telefono del usuario" name="telefono" 
                    class="w-64" required class="w-xl mb-2"/>
                <flux:input type="submit" value="Guardar usuario" class="w-xl mb-4 bg-cyan-500"/>
            </form>
        </div>
    </div>
</x-layouts.app>
